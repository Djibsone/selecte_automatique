$(document).ready(function () {
    // Sélection du premier sélecteur (département)
    var departementSelect = $("#departement");
    
    // Sélection du deuxième sélecteur (commune)
    var communeSelect = $("#commune");

    // Sélection du troisième sélecteur (arrondissement)
    var arrondissementSelect = $("#arrondissement");

    // Sélection du quatrième sélecteur (village)
    var villageSelect = $("#village");

    // URL de l'API pour récupérer l'elmt sélectionné
    var apiUrl = "./api.php"; // Remplacez par l'URL de votre API

    // Écouter l'événement de changement sur le sélecteur de département
    departementSelect.on("change", function () {
        var selectedDepartement = departementSelect.val();

        if (selectedDepartement) {
            // Faire une requête Ajax pour récupérer les communes
            $.ajax({
                url: apiUrl,
                type: "post",
                data: { departement: selectedDepartement },
                dataType:'json',
                success: function (data) {
                    // Réinitialisez le sélecteur de commune
                    communeSelect.empty().append('<option value="">Sélectionner la commune</option>');

                    // Mettre à jour le sélecteur de commune avec les nouvelles options
                    $.each(data, function (index, commune) {
                        communeSelect.append($('<option>', {
                            value: commune.id,
                            text: commune.nom_c
                        }));
                    });
                },
                error: function () {
                    console.error("Erreur lors de la récupération des communes.");
                }
            });
        }
    });

    // Écouter l'événement de changement sur le sélecteur de commune
    communeSelect.on("change", function () {
        var selectedCommune = communeSelect.val();

        if (selectedCommune) {
            // Faire une requête Ajax pour récupérer les arrondissements
            $.ajax({
                url: apiUrl,
                type: "post",
                data: { commune: selectedCommune },
                dataType:'json',
                success: function (data) {
                    // Réinitialisez le sélecteur de l'arrondissement
                    arrondissementSelect.empty().append('<option value="">Sélectionner l\'arrondissement</option>');

                    // Mettre à jour le sélecteur de l'arrondissement avec les nouvelles options
                    $.each(data, function (index, arrondissement) {
                        arrondissementSelect.append($('<option>', {
                            value: arrondissement.id,
                            text: arrondissement.nom_a
                        }));
                    });
                },
                error: function () {
                    console.error("Erreur lors de la récupération des arrondissements.");
                }
            });
        }
    });

    // Écouter l'événement de changement sur le sélecteur de arrondissement
    arrondissementSelect.on("change", function () {
        var selectedArrondissement = arrondissementSelect.val();

        if (selectedArrondissement) {
            // Faire une requête Ajax pour récupérer les villages
            $.ajax({
                url: apiUrl,
                type: "post",
                data: { arrondissement: selectedArrondissement },
                dataType:'json',
                success: function (data) {
                    // Réinitialisez le sélecteur de commune
                    villageSelect.empty().append('<option value="">Sélectionner le village</option>');

                    // Mettre à jour le sélecteur de village avec les nouvelles options
                    $.each(data, function (index, village) {
                        villageSelect.append($('<option>', {
                            value: village.id,
                            text: village.nom_v
                        }));
                    });
                },
                error: function () {
                    console.error("Erreur lors de la récupération des villages.");
                }
            });
        }
    });
});