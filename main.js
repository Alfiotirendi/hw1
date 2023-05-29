
function search(event){

    const form_data = new FormData(document.querySelector(".search form"));
    console.log((form_data.get('search')));
    fetch("search_meal.php?q="+encodeURIComponent(form_data.get('search'))).then(searchResponse).then(jsonMeal);
    
    event.preventDefault();
}

function searchResponse(response){
    console.log('ciao');
    console.log(response);
    return response.json();
}

function jsonMeal(json){
    console.log(json);
    console.log('ciaociao');
    const containermeals = document.querySelector(".gallery");
    containermeals.innerHTML='';
    // if (!json.meals.items.length) {noResults(); return;}

    for (let meal in json.meals) {
     const box = document.createElement('div');
     box.dataset.id = json.meals[meal].idMeal;
     box.dataset.name = json.meals[meal].strMeal;
     box.dataset.type = json.meals[meal].strCategory;
     box.dataset.image = json.meals[meal].strMealThumb;

   console.log('blabla');

    const img = document.createElement('img');
    img.src = json.meals[meal].strMealThumb;
    img.classList.add('mealimage')
    box.appendChild(img);

    const boxinfo= document.createElement('div');
    const name = document.createElement('span');
    name.textContent ="Name: "+ json.meals[meal].strMeal;
    boxinfo.appendChild(name);

    const type = document.createElement('span');
    type.textContent ="Type: "+ json.meals[meal].strCategory;
    boxinfo.appendChild(type);
    
    boxinfo.classList.add('boxinfo');
    
    box.appendChild(boxinfo);
    box.classList.add("meal");
    containermeals.appendChild(box);

    
   const more = document.createElement('button');
   more.dataset.meal=json.meals[meal].strMeal;
   more.textContent="More";
   more.classList.add('more');
   more.addEventListener("click",moreInfo);
   boxinfo.appendChild(more);


}
}

function moreInfo(event)
{

    const button = event.currentTarget;
    const hiddenform = document.querySelector('.hiddeninput form');
    input = document.getElementById('inputbutton');
    input.value= encodeURIComponent(button.dataset.meal);
    hiddenform.submit();


}




    
    document.querySelector(".search form").addEventListener("submit", search);