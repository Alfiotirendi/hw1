function search(){

    
    fetch("returnfav.php").then(searchResponse).then(jsonMeal);
    
    
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
   

    for (let meal in json) {
     const box = document.createElement('div');
     console.log(json.idMeal);
     
     box.dataset.name = json[meal].strMeal;
     
     box.dataset.type = json[meal].strCategory;
     box.dataset.image = json[meal].strMealThumb;

   console.log('blabla');

    const img = document.createElement('img');
    img.src = json[meal].strMealThumb;
    img.classList.add('mealimage')
    box.appendChild(img);

    const boxinfo= document.createElement('div');
    const name = document.createElement('span');
    name.textContent ="Name: "+ json[meal].strMeal;
    boxinfo.appendChild(name);

    const type = document.createElement('span');
    type.textContent ="Type: "+ json[meal].strCategory;
    boxinfo.appendChild(type);
    
    boxinfo.classList.add('boxinfo');
    
    box.appendChild(boxinfo);
    box.classList.add("meal");
    containermeals.appendChild(box);

    
   const more = document.createElement('button');
   more.dataset.meal=json[meal].strMeal;
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






    
   search();