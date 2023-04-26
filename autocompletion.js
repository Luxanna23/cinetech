const search = document.getElementById("search-bar");
const result = document.getElementById("result");
const result3 = document.getElementById("result3");
if (search) {
  search.addEventListener("keyup", () => {
    result.innerHTML = "";
    if (search.value != "") {
      fetch(
        "https://api.themoviedb.org/3/search/multi?api_key=2d62a5fc9712784f4836c711e52d352f&language=en-US&page=1&include_adult=false&query=" +
          search.value +
          ""
      )
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          data.results.forEach((element) => {
            console.log(element);

            // let title = element.title;
            // console.log(title);
            if (element.media_type === "person") {
              result.innerHTML += "<a href='resultat.php?name=" + element.name + "'><p>" + element.name + " (acteur) </p></a>";
            } else if (element.media_type === "tv") {
              result.innerHTML +="<a href='resultat.php?name=" +element.name +"'><p>" +element.name +" (serie)</p></a>";
              const link = window.location.href;
              const nameUrl = link.split("=")[1];
              console.log(nameUrl);
            } else if (element.media_type === "movie") {
              result.innerHTML +="<a href='resultat.php?name=" +element.title +"'><p>" +element.title +" (film)</p></a>";
            }
          });
        });
    }
  });
}
