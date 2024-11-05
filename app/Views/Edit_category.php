<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PARKin Category Edition</title>
    <link rel="icon" href="<?=base_url('assets/images/ico.png');?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css');?>">
</head>
<body class="bg-light" style="font-family: Quicksand;">
    <div class="container my-3">
        <div class="row">
            <div class="col-11 mx-auto mt-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h2 class="h6 text-muted"><i class="fas fa-edit"></i> &nbsp;Update Category Details</h2>
                        <form id="editForm"  action="<?=base_url('/admin/update_category/'.$category['cat_id']);?>" method="post" class="mt-4">
                            <div class="form-group">
                              <label class="text-muted  m-0 p-0">Parking Area Number</label>
                              <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control form-control-sm shadow-none" name="parking_area_no" value="<?=$category['parking_area_no'];?>" autofocus required>
                            </div>
                            <div class="form-group">
                              <label class="text-muted  m-0 p-0">Vehicle Type</label>
                              <input type="text" class="form-control form-control-sm shadow-none" name="vehicle_type" value="<?=$category['vehicle_type'];?>">
                            </div>
                            <div class="form-group">
                              <label class="text-muted  m-0 p-0">Vehicle limit</label>
                              <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" class="form-control form-control-sm shadow-none" name="vehicle_limit" value="<?=$category['vehicle_limit'];?>" required>
                            </div>
                            <div class="form-group">
                              <label class="text-muted  m-0 p-0">Parking Charge</label>
                              <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control form-control-sm shadow-none" name="parking_charge" value="<?=$category['parking_charge'];?>" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="send" class="btn btn-sm text-white mt-4 btn-block shadow-none border-0 bg-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Sur la soumission du formulaire
    document.getElementById('editForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche le comportement par défaut

        // Envoyer les données du formulaire via fetch ou XMLHttpRequest
        fetch(this.action, {
            method: 'POST',
            body: new FormData(this)
        })
        .then(response => response.text()) // Attendre la réponse du serveur
        .then(() => {
            window.opener.location.reload(); // Recharger la page principale
            window.close(); // Fermer la fenêtre popup
        })
        .catch(error => console.error('Erreur:', error));
    });
</script>
</body>
</html>