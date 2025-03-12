<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Knp\Component\Pager\PaginatorInterface;

#[Route('/employee')]
final class EmployeeController extends AbstractController
{
    #[Route(name: 'app_employee_index', methods: ['GET'])]
    public function index(EmployeeRepository $employeeRepository,PaginatorInterface $paginator,Request $request): Response
    {
        $query = $employeeRepository->createQueryBuilder('e')->getQuery();
        $employees = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),5
        );
        return $this->render('employee/index.html.twig', [
            'employees' => $employees,
        ]);
    }

    #[Route('/new', name: 'app_employee_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $employee = new Employee();
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employee);
            $entityManager->flush();

            return $this->redirectToRoute('app_employee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employee/new.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/show', name: 'app_employee_show', methods: ['GET'])]
    public function show(Employee $employee): Response
    {
        return $this->render('employee/show.html.twig', [
            'employee' => $employee,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_employee_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employee $employee, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_employee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employee/edit.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_employee_delete', methods: ['POST'])]
    public function delete(Request $request, Employee $employee, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employee->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($employee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_employee_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/filter', name: 'app_employee_filter', methods: ['POST'])]
    public function filter(Request $request, EmployeeRepository $employeeRepository,PaginatorInterface $paginator): JsonResponse
    {
        $operator = $request->request->get('operator');
        $salary = $request->request->get('salary');

        if (empty($operator) && empty($salary)) {
            $query = $employeeRepository->createQueryBuilder('e')->getQuery();
            $employees = $paginator->paginate(
                $query,
                $request->query->getInt('page', 1),5
            );

        } else{
            $employees = $employeeRepository->createQueryBuilder('e')
                ->where("e.salary $operator :salary")
                ->setParameter('salary', $salary)
                ->getQuery()
                ->getResult();
        }
        $data = [];
        foreach ($employees as $employee) {
            $data[] = [
                'id' => $employee->getId(),
                'salary' => $employee->getSalary(),
                'first_name' => $employee->getFirstName(),
                'last_name' => $employee->getLastName(),
                'age' => $employee->getAge(),
                'hobby' => $employee->getHobby(),
                'gender' => $employee->getGender(),
                'about'  => $employee->getAbout(),
                'role' => $employee->getRole(),
                'city'  => $employee->getCity(),
            ];
        }
        return new JsonResponse(['employees'=>$data]);
    }

    #[Route('/employee/search', name: 'app_employee_search', methods: ['POST'])]
    public function search(Request $request, EmployeeRepository $employeeRepository): JsonResponse
    {
        $search = $request->request->get('search');

        $employees = $employeeRepository->createQueryBuilder('e')
            ->where('e.first_name LIKE :search')
            ->setParameter('search', '%' . $search . '%')
            ->getQuery()
            ->getResult();

        $data = [];

        foreach ($employees as $employee) {
            $data[] = [
                'id' => $employee->getId(),
                'first_name' => $employee->getFirstName(),
                'last_name' => $employee->getLastName(),
                'age' => $employee->getAge(),
                'hobby' => $employee->getHobby(),
                'gender' => $employee->getGender(),
                'about' => $employee->getAbout(),
                'salary' => $employee->getSalary(),
                'role' => $employee->getRole(),
                'city' => $employee->getCity(),
            ];
        }
        return new JsonResponse(['employees' => $data]);
    }
}

