let containerMovie = document.getElementById("containerMovie");
let containerSerie = document.getElementById("containerSerie");

for (let i = 1; i <= 10; i++) {
  fetch(
    "https://api.themoviedb.org/3/trending/all/day?api_key=2d62a5fc9712784f4836c711e52d352f&page=" +
      i +
      ""
  )
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      //console.log(data);
      data.results.forEach((element) => {
        let divMovie = document.createElement("div");
        divMovie.className = "item";
        let imgMovie = document.createElement("img");
        imgMovie.src = "https://image.tmdb.org/t/p/original" + element.poster_path;
        imgMovie.className = "d-block w-100";
        containerMovie.append(divMovie);
        divMovie.append(imgMovie);
      });
    })
    .catch((error) => {
      console.log(error);
    });
}
