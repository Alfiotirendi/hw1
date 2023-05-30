

function search(){

    const input = document.querySelector("#idvalue");
    console.log(input.value);
    fetch("search_meal.php?q="+encodeURIComponent(input.value)).then(searchResponse).then(jsonMeal);
    
    
}

function searchResponse(response){
    
    console.log(response);
    return response.json();
}

function jsonMeal(json){
    console.log(json);
    
    
    // if (!json.meals.items.length) {noResults(); return;}

    const boxdata = document.querySelector('.databox')
    boxdata.dataset.id = json.meals[0].idMeal;
    boxdata.dataset.name = json.meals[0].strMeal;
    boxdata.dataset.type = json.meals[0].strCategory;
    boxdata.dataset.image = json.meals[0].strMealThumb;

   
   





    
    const boximg = document.querySelector('.image')
    boximg.innerHTML="";
    const img = document.createElement('img');
    img.src = json.meals[0].strMealThumb;
    boximg.appendChild(img);

    const namebox = document.querySelector('#namebox');
    namebox.innerHTML="";
    namebox.textContent =json.meals[0].strMeal;

    const instr = document.querySelector('.instruction');
    instr.innerHTML = "";
    instr.textContent= json.meals[0].strInstructions;


    const infobox = document.querySelector(".info")
    const ingredient = document.createElement('div');
    ingredient.innerHTML="";

    const ingr1 =json.meals[0].strIngredient1;
    ingredient.textContent=  "Main ingredient: "+ingr1;
    infobox.appendChild(ingredient);


    const category = document.createElement('div');
    category.textContent="Category: "+ json.meals[0].strCategory;
    infobox.appendChild(category);

    const from = document.createElement('div');
    from.textContent = "Provenance: " + json.meals[0].strArea;
    infobox.appendChild(from);
    
    const boximgsav = document.createElement('div');
    boximgsav.classList.add("favourite");
    
    infobox.appendChild(boximgsav);
    const imgsave = document.createElement('img');


    imgsave.classList.add('fav');
    
    fetch("fav.php?q="+encodeURIComponent(json.meals[0].strMeal)).then(fetchResponse).then(jsonCheckUsername);
    boximgsav.appendChild(imgsave);
    
   




    


    




}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();}

function jsonCheckUsername(json) {
    

        if ( !json.exists) {
            document.querySelector('.fav').src = "unsaved.png";
            console.log('not');
            document.querySelector('.fav').addEventListener('click', Aggiungi)


        } else {
            document.querySelector('.fav').src = "saved.png";
            console.log('exists');
            document.querySelector('.fav').addEventListener('click', Rimuovi)
            
            
        }
    }

    function Rimuovi()
    {
        const box = document.querySelector('.databox');
        const formData = new FormData();
	    formData.append('meal',box.dataset.name);
        console.log(box.dataset.name);
        fetch("delete.php", { method: 'POST', body: formData });
        document.querySelector('.fav').src = "unsaved.png";
        document.querySelector('.fav').removeEventListener('click',Rimuovi);
        document.querySelector('.fav').addEventListener('click', Aggiungi);
        

    }


    function Aggiungi()
    {
        
        const box = document.querySelector('.databox');

        const formData = new FormData();
	    formData.append('meal',box.dataset.name);
        console.log(box.dataset.name);
        formData.append('type',box.dataset.type);
        formData.append('image',box.dataset.image);

        fetch("add.php", { method: 'POST', body: formData });
        document.querySelector('.fav').src = "saved.png";
        document.querySelector('.fav').removeEventListener('click',Aggiungi);
        document.querySelector('.fav').addEventListener('click', Rimuovi);

   
    }


search();

