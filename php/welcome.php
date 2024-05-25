<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de Scan</title>
    <!-- Lien vers Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS personnalisé -->
    <style>
        body {
            background-color: #eee;
        }
        table thead th, table thead  td {
            text-align: center;
        }
        table tr:nth-child(even) {
            background-color: #BEF2F5;
        }
        .pagination li:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sélectionnez le Nombre de Lignes</h2>
        <div class="form-group">      
            <select class="form-control" name="state" id="maxRows">
                <option value="5000">Afficher Toutes les Lignes</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="70">70</option>
                <option value="100">100</option>
            </select>        
        </div>
        <table class="table table-striped" id="table-id">
            <thead>
                <tr>
                    <th>Adresse IP</th>
                    <th>Nom d'hôte</th>
                    <th>État</th>
                    <th>Adresse MAC</th>
                    <th>Fabricant</th>
                    <th>Date</th>
                    <th>Heure</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <!-- Les données seront remplies dynamiquement ici -->
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const proxyUrl = 'https://cors-anywhere.herokuapp.com/';
            const apiUrl = 'https://raw.githubusercontent.com/SamirFezani/scane.me/main/scan_results.json';

            fetch(proxyUrl + apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('La réponse du réseau n\'était pas valide');
                    }
                    return response.json();
                })
                .then(data => {
                    // Traiter les données JSON récupérées et remplir le tableau
                    var tableBody = document.getElementById('table-body');
                    data.forEach(function(row) {
                        var tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${row['Adresse IP']}</td>
                            <td>${row['Nom d\'hôte']}</td>
                            <td>${row['État']}</td>
                            <td>${row['Adresses MAC']}</td>
                            <td>${Object.values(row['Fabricant']).join(', ')}</td>
                            <td>${row['Date']}</td>
                            <td>${row['Heure']}</td>
                        `;
                        tableBody.appendChild(tr);
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));
        });

        document.getElementById('maxRows').addEventListener('change', function() {
            var maxRows = parseInt(this.value);
            var tableRows = document.querySelectorAll('#table-id tbody tr');

            for (var i = 0; i < tableRows.length; i++) {
                if (i < maxRows) {
                    tableRows[i].style.display = 'table-row';
                } else {
                    tableRows[i].style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>
