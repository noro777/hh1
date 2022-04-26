let a = document.getElementById('app');

async function getAll() {
    let res = await fetch('php.php/api/redis');

    let response = await res.json()

    render(response.data)

}

getAll();

async function deleteItem(key){

    await fetch('php.php/api/redis/'+key);

    a.innerHTML = ''

    await getAll()
}

function render(data){
    for (const [key, value] of Object.entries(data)) {
        a.innerHTML += `
                <ul>
                    <li>${key}: ${value} <button onclick="deleteItem('${key}')">delete</button></li>
                </ul>
            `;
    }
}