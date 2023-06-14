
const URL = 'http://localhost:8080/alocacao.php';

const tableBody = document.querySelector('#livrosTable')

function carregarLivros() {
    fetch(URL, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        mode: 'cors'
    })
        .then(response => response.json())
        .then(livros => {
            tableBody.innerHTML = ''

            for (let i = 0; i < livros.length; i++) {
                const tr = document.createElement('tr')
                const livro = livros[i]
                tr.innerHTML = `
                    <td>${livro.id}</td>
                    <td>${livro.titulo}</td>
                    <td>${livro.autor}</td>
                    <td>${livro.ano_publicacao}</td>
                    <td>
                        <button data-id="${livro.id}" onclick="atualizarLivro(${livro.id})">Editar</button>
                        <button onclick="excluirLivro(${livro.id})">Excluir</button>
                    </td>
                `
                tableBody.appendChild(tr)
            }

        })
}

//-----------------------------------------------------------------------------------------//