const btns=[
{
    id: 1, 
    name: 'Fiction'
},
{
    id: 2, 
    name: 'Non Fiction'
},
{
    id: 3, 
    name: 'Best Sellers'
},
{
    id: 4, 
    name: 'Top Picks'
},
{
    id: 5, 
    name: 'Psychology & Mind'
},
{
    id: 6, 
    name: 'New Arrivals'
},
]
const filters = [...new Set(btns.map((btn)=>
    {return btn}))]
document.getElementById('btns').innerHTML = filters.map((btn)=>{
    var{name, id} = btn;
    return(
        "<button class=' filter-button fil-p' onclick='filterItems("+(id)+`)'>${name}</button>`
        )
}).join('');

const product = [
{
    id: 1,
    image: './images/book-list/book1.jfif',
    title: 'It Ends With Us',
    price: 400,
    category: 'Fiction'
},
{
    id: 2,
    image: './images/book-list/book2.jpeg',
    title: 'Ikigai',
    price: 500,
    category: 'Non Fiction'
},
{
    id: 3,
    image: './images/book-list/book5.jfif',
    title: 'Verity',
    price: 500,
    category: 'Best Sellers'
},
{
    id: 1,
    image: './images/book-list/book6.jfif',
    title: 'Homebody',
    price: 300,
    category: 'Fiction'
},
{
    id: 2,
    image: './images/book-list/book7.jpg',
    title: 'Land',
    price: 300,
    category: 'Non Fiction'
},
{
    id: 3,
    image: './images/book-list/book8.jfif',
    title: 'Atomic Habits',
    price: 350,
    category: 'Best Sellers'
},
{
    id: 4,
    image: './images/book-list/book9.jfif',
    title: 'Karnali Blues',
    price: 300,
    category: 'Top Picks'
},
{
    id: 5,
    image: './images/book-list/b3.jpg',
    title: 'Life Lessons',
    price: 350,
    category: 'Psychology & Mind'
},
{
    id: 6,
    image: './images/book-list/b5.jpg',
    title: 'Niksen',
    price: 350,
    category: 'New Arrivals'
}
];

const categories = [...new Set(product.map((item)=>
    {return item}))]

const filterItems = (a) =>{
    const filterCategories = categories.filter(item);
    function item(value){
        if(value.id == a){
            return(
                value.id
            )
        }
    }
    displayItem(filterCategories)
}

const displayItem = (items) => {
    document.getElementById('root').innerHTML = items.map((item)=>
    {
        var {image, title, price} =item;
        return(
            `<div class='box'>
            <h3>${title}</h3>
            <div class='img-box'>
            <img class='images' src=${image}></img>
            </div>
            <div class='bottom'>
            <h4> NPR. ${price}.00</h4>
            <button class='filter-button'> ADD TO CART </button>
            </div>
            </div>`)
    }).join('');
}
displayItem(categories);