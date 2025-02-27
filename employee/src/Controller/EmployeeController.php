<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/employee')]
final class EmployeeController extends AbstractController
{
    #[Route(name: 'app_employee_index', methods: ['GET'])]
    public function index(EmployeeRepository $employeeRepository): Response
    {
        return $this->render('employee/index.html.twig', [
            'employees' => $employeeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_employee_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,SluggerInterface $slugger): Response
    {
        $employee = new Employee();
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $documentFile = $form->get('document')->getData();
            if ($documentFile) {
                $originalFilename = pathinfo($documentFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$documentFile->guessExtension();
                try {
                    $documentFile->move($this->getParameter('documents_directory'), $newFilename);
                }catch (FileException $e){

                }
            $employee->setDocument($newFilename);
            }
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
    public function edit(Request $request, Employee $employee, EntityManagerInterface $entityManager,SluggerInterface $slugger): Response
    {

        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $documentFile = $form->get('document')->getData();
            if ($documentFile) {
                $originalFilename = pathinfo($documentFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$documentFile->guessExtension();
                try {
                    $documentFile->move($this->getParameter('documents_directory'), $newFilename);
                }catch (FileException $e){

                }
                if($employee->getDocument())
                {
                    @unlink($this->getParameter('documents_directory').'/'.$employee->getDocument());
                }
                $employee->setDocument($newFilename);
            }

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
    #[Route('/employee/filter', name: 'app_employee_filter', methods: ['POST'])]
    public function filter(Request $request, EmployeeRepository $employeeRepository,CsrfTokenManagerInterface $csrfTokenManager): JsonResponse
    {
        $operator = $request->request->get('operator');
        $salary = $request->request->get('salary');

        $employees = $employeeRepository->findBySalaryFilter($operator, $salary);

        return $this->json([
            'employees' => array_map(fn($e) => [
                'id' => $e->getId(),
                'salary' => $e->getSalary(),
                'first_name' => $e->getFirstName(),
                'last_name' => $e->getLastName(),
                'age' => $e->getAge(),
                'hobby' => $e->getHobby(),
                'gender' => $e->getGender(),
                'about'  => $e->getAbout(),
                'role' => $e->getRole(),
                'city'  => $e->getCity(),
                'csrf_token' => $csrfTokenManager->getToken('delete'.$e->getId())->getValue(),
                'document' => $e->getDocument(),

            ], $employees),
        ]);
    }

    #[Route('/employee/search', name: 'app_employee_search', methods: ['POST'])]
    public function search(Request $request, EmployeeRepository $employeeRepository): JsonResponse
    {
        $search = $request->request->get('search');

        $employees = $employeeRepository->createQueryBuilder('e')
            ->where('e.first_name LIKE :search')
            ->orWhere('e.last_name LIKE :search')
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
                'document' => $employee->getDocument(),
                'csrf_token' => $this->container->get('security.csrf.token_manager')->getToken('delete' . $employee->getId())->getValue()
            ];
        }

        return new JsonResponse(['employees' => $data]);
    }
}
