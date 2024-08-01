<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="my-custom-class">Lista de Usuários</h1>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Avatar</th>
                        <th>Title</th>
                        <th>Key Skill</th>
                    </tr>
                </thead>
                <tbody id="user-table-body">
                    <!-- tabela de usuários -->
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            <nav>
                <ul class="pagination" id="pagination">
                    <!-- paginação-->
                </ul>
            </nav>
        </div>
    </div>
    <script>
        const users = @json($users);
        const perPage = 5;
        let currentPage = 1;

        function renderTable(data) {
            const tableBody = document.getElementById('user-table-body');
            tableBody.innerHTML = '',

                data.forEach(user => {
                    const row = `
                <tr>
                    <td>${user.id}</td>
                    <td>${user.first_name} ${user.last_name}</td>
                    <td>${user.username}</td>
                    <td>${user.email}</td>
                    <td>${user.phone_number}</td>
                    <td><img src="${user.avatar}" alt="Avatar" width="50"></td>
                    <td>${user.employment.title}</td>
                    <td>${user.employment.key_skill}</td>
                </tr>
            `;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });
        }

        function setupPagination() {
            const totalPages = Math.ceil(users.length / perPage);
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                const pageItem = document.createElement('li');
                pageItem.classList.add('page-item');
                pageItem.innerHTML = `<a class="page-link">${i}</a>`
                pageItem.addEventListener('click', () => {
                    currentPage = i;
                    paginate()
                });
                pagination.appendChild(pageItem)
            }
        }

        function paginate() {
            const start = (currentPage - 1) * perPage;
            const end = start + perPage;
            const paginatedData = users.slice(start, end);
            renderTable(paginatedData);
        }
        setupPagination();
        paginate();
    </script>
    <style>
        .pagination {
            cursor: pointer;
        }

        h1 {
            text-align: center;
            padding-bottom: 20px
        }

        .table-container {
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(36, 36, 36, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin: 20px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead th {
            background-color: #617f9c;
            color: #ffffff;
            text-align: center;
            padding: 12px;
        }

        .table td,
        .table th {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</body>

</html>
