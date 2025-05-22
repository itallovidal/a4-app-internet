// window.onload = () => {
//     console.log("Hello World");
//     const apikey = 'xeuNTpjLD7vPPTAT2RhXFyaJP1QSTgDtoRVyxC1GDSk9J2SkT9Srvw8B'

//     getBooks(apikey).then((result) => {
//         console.log("Books fetched successfully");
//         console.log(result);
//         const photos = result.photos;
//         createElement(photos, document.querySelector('main'));
//     })
// }


function createElement(photos, container) {

    for (let i = 0; i < photos.length; i++) {
        const element = document.createElement('img');
        element.setAttribute('src', photos[i].src.tiny);
        element.setAttribute('alt', photos[i].alt);
        element.setAttribute('width', '300');
        element.setAttribute('height', '200');

        container.appendChild(element);
    }

}

async function getBooks(apiKey) {
    const result = await fetch('https://api.pexels.com/v1/search?query=books&per_page=10', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `${apiKey}`
        }
    })

    const books = await result.json();
    return books
}