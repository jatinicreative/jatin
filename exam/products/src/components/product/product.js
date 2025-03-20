  export default {
    data(){
    return{
    products: [],
    selectedCategory:'',
    searchQuery:'',
    selectedPrice:'',
    sortOrder: '',
    sortKey: '',
    pageSize:5,
    currentPage:1,
};
},
    async created(){
    try {
    const response = await fetch('https://fakestoreapi.com/products');
    this.products = await response.json();

} catch (error) {
    console.error('Error fetching products:', error);
}
},
    methods:{
    deleteProduct(id){
    if(confirm("Are you sure? You want to delete this item?"))
{
    this.products = this.products.filter( product => product.id !== id);
}
},
    changePage(page){
    if(page >=1 && page<= this.totalPages){
    this.currentPage = page;
}
},
},
    watch: {
    sortOrder(newValue) {
    if (newValue) {
    this.sortKey = '';
}
},
    sortKey(newValue) {
    if (newValue) {
    this.sortOrder = '';
}
}
},
    computed:{
    filteredProducts(){
    let filtered = this.products;
    if(this.selectedCategory){
    filtered = filtered.filter( product => product.category === this.selectedCategory)
}
    if(this.searchQuery){
    filtered = filtered.filter( product => product.title.toLowerCase().includes(this.searchQuery.toLowerCase()))
}
    if(this.sortOrder){
    filtered = filtered.slice().sort((a, b) => {
    return this.sortOrder === 'asc'
    ? a.title.localeCompare(b.title)
    : b.title.localeCompare(a.title);
});
}
    if (this.sortKey) {
    filtered = filtered.slice().sort((a, b) => {
    return this.sortKey === 'asc'
    ? a.price - b.price
    : b.price - a.price;
});
}
    return filtered;
},
    totalPrice(){
    return this.filteredProducts.reduce((sum,product)=> sum + product.price, 0);
},
    totalPages(){
    return Math.ceil(this.filteredProducts.length / this.pageSize);
},
    paginatedProducts(){
    const start = (this.currentPage - 1) * this.pageSize;
    const end = start + this.pageSize;
    return this.filteredProducts.slice(start, end);
},
},
};