let scroll1 = document.getElementById("scroll1");
let scroll2 = document.getElementById("scroll2");
let scroll3 = document.getElementById("scroll3");

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
        imgMovie.className = "pscroll";
        scroll1.append(divMovie);
        divMovie.append(imgMovie);
      });
    })
    .catch((error) => {
      console.log(error);
    });
}

for (let i = 1; i <= 10; i++) {
  fetch(
    "https://api.themoviedb.org/3/movie/top_rated?api_key=2d62a5fc9712784f4836c711e52d352f&language=en-US&page=" +
      i +
      ""
  )
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      data.results.forEach((element) => {
        let divMovie = document.createElement("div");
        divMovie.className = "item";
        let imgMovie = document.createElement("img");
        imgMovie.src = "https://image.tmdb.org/t/p/original" + element.poster_path;
        imgMovie.className = "pscroll";
        scroll2.append(divMovie);
        divMovie.append(imgMovie);
      });
    })
    .catch((error) => {
      console.log(error);
    });
}

for (let i = 1; i <= 10; i++) {
  fetch(
    "https://api.themoviedb.org/3/movie/latest?api_key=<<api_key>>&language=en-US" +
      i +
      ""
  )
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      data.results.forEach((element) => {
        let divMovie = document.createElement("div");
        divMovie.className = "item";
        let imgMovie = document.createElement("img");
        imgMovie.src = "https://image.tmdb.org/t/p/original" + element.poster_path;
        imgMovie.className = "pscroll";
        scroll3.append(divMovie);
        divMovie.append(imgMovie);
      });
    })
    .catch((error) => {
      console.log(error);
    });
}
