<?= $this->extend('Layout') ?>

<?= $this->section('Content') ?>


<?php if(session()->getFlashdata('delete_vehicle')):?>
    <div class="alert alert-success mt-2">
        <?= session()->getFlashdata('delete_vehicle');?>
    </div>
<?php endif;?>
<div class="container-fluid p-0 ">
    <div class="row no-gutters">
        <div class="col-15 mt-5 ">
            <div class="row justify-content-center">
                <div class="col-10 ml-1">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                        <h2 class="h6 text-muted mb-4"><i class="fa-solid fa-magnifying-glass"></i> &nbsp;Search vehicle</h2>
                            <!-- Moteur de Recherche -->
                            <form action="<?= base_url('/Search_vehicle') ?>" method="get">
                                <div class="input-group mb-4">
                                    <input type="text" name="search_query" class="form-control" placeholder="Search vehicle by number">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </form>
                            <!-- Filtres -->
                            <form action="<?= base_url('/Search_vehicle') ?>" method="get">
                                <div class="row g-3">
                                <!-- Filtre par Type de Véhicule -->
                                <div class="col-md-4">
                                    <label for="vehicle_type" class="form-label">Vehicle type</label>
                                    <select class="form-select" name="vehicle_type" id="vehicle_type">
                                        <option value="">All</option>
                                        <?php foreach ($vehicle_types as $type): ?>
                                            <option value="<?= $type['vehicle_type'] ?>"><?= $type['vehicle_type'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Filtre par Montant de Charge (min et max) -->
                                <div class="col-md-4">
                                    <label for="parking_charge_min" class="form-label">Parking charge (min)</label>
                                    <input type="number" class="form-control" name="parking_charge_min" id="parking_charge_min" placeholder="Min">
                                </div>
                                <div class="col-md-4">
                                    <label for="parking_charge_max" class="form-label">Parking charge (max)</label>
                                    <input type="number" class="form-control" name="parking_charge_max" id="parking_charge_max" placeholder="Max">
                                </div>
                                <!-- Filtre par Date d'Arrivée (début et fin) -->
                                <div class="col-md-4">
                                    <label for="arrival_time_start" class="form-label">Arrival date (begin)</label>
                                    <input type="date" class="form-control" name="arrival_time_start" id="arrival_time_start">
                                </div>
                                <div class="col-md-4">
                                    <label for="arrival_time_end" class="form-label">Arrival date (end)</label>
                                    <input type="date" class="form-control" name="arrival_time_end" id="arrival_time_end">
                                </div>
                                        
                                <!-- Filtre par Statut (0 pour garé, 1 pour parti) -->
                                <div class="col-md-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="">All</option>
                                        <option value="0">Parked</option>
                                        <option value="1">Departed</option>
                                    </select>
                                </div>
                                        
                                <!-- Bouton Filtrer -->
                                <div class="col-md-4 d-flex align-items-end">
                                    <button class="btn btn-success w-100" type="submit">Apply filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                                        
                    <div class="col-12 mt-3 ">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h2 class="h6 text-muted "><i class="fa-solid fa-list-ul"></i> &nbsp;Results</h2>
                                <!-- Résultats de la recherche et des filtres -->
                                <div class="mt-2">
                                    <div class="table-responsive">
                                        <table class="table table-striped rounded-3 p-3" style="border-collapse: separate; border-spacing: 0; overflow: hidden; padding: 0.5rem;">
                                            <thead class=" text-center">
                                                <tr class="bg-primary text-white">
                                                    <th>#</th>
                                                    <th>Vehicle no</th>
                                                    <th>Type</th>
                                                    <th>Parking charge</th>
                                                    <th>Arrival time</th>
                                                    <th>Statut</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php if (!empty($vehicles)): ?>
                                                <?php foreach ($vehicles as $vehicle): ?>
                                                    <tr>
                                                        <td><?= $vehicle['id'] ?></td>
                                                        <td><?= $vehicle['vehicle_no'] ?></td>
                                                        <td><?= $vehicle['vehicle_type'] ?></td>
                                                        <td><?= $vehicle['parking_charge'] ?>€</td>
                                                        <td><?= $vehicle['arrival_time'] ?></td>
                                                        <td><?= ($vehicle['status'] == 0) ? 'Garé' : 'Parti' ?></td>

                                                        <td>
                                                            <a class="confirm_link" href="#" data-url="<?= base_url('/admin/delete_vehicle/'.$vehicle['id']);?> " >
                                                            <svg width="30" height="30" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
                                                                <path fill="#FF0000"  d="M14.7223 12.7585C14.7426 12.3448 14.4237 11.9929 14.01 11.9726C13.5963 11.9522 13.2444 12.2711 13.2241 12.6848L12.9999 17.2415C12.9796 17.6552 13.2985 18.0071 13.7122 18.0274C14.1259 18.0478 14.4778 17.7289 14.4981 17.3152L14.7223 12.7585Z" fill="#343C54"/>
                                                                <path fill="#FF0000"  d="M9.98802 11.9726C9.5743 11.9929 9.25542 12.3448 9.27577 1.7585L9.49993 17.3152C9.52028 17.7289 9.87216 18.0478 10.2859 18.0274C10.6996 18.0071 11.0185 17.6552 10.9981 17.2415L10.774 12.6848C10.7536 12.2711 10.4017 11.9522 9.98802 11.9726Z" fill="#343C54"/>
                                                                <path fill="#FF0000"  fill-rule="evenodd" clip-rule="evenodd" d="M10.249 2C9.00638 2 7.99902 3.00736 7.99902 4.25V5H5.5C4.25736 5 3.25 6.00736 3.25 7.25C3.25 8.28958 3.95503 9.16449 4.91303 9.42267L5.54076 19.8848C5.61205 21.0729 6.59642 22 7.78672 22H16.2113C17.4016 22 18.386 21.0729 18.4573 19.8848L19.085 9.42267C20.043 9.16449 20.748 8.28958 20.748 7.25C20.748 6.00736 19.7407 5 18.498 5H15.999V4.25C15.999 3.00736 14.9917 2 13.749 2H10.249ZM14.499 5V4.25C14.499 3.83579 14.1632 3.5 13.749 3.5H10.249C9.83481 3.5 9.49902 3.83579 9.49902 4.25V5H14.499ZM5.5 6.5C5.08579 6.5 4.75 6.83579 4.75 7.25C4.75 7.66421 5.08579 8 5.5 8H18.498C18.9123 8 19.248 7.66421 19.248 7.25C19.248 6.83579 18.9123 6.5 18.498 6.5H5.5ZM6.42037 9.5H17.5777L16.96 19.7949C16.9362 20.191 16.6081 20.5 16.2113 20.5H7.78672C7.38995 20.5 7.06183 20.191 7.03807 19.7949L6.42037 9.5Z" fill="#343C54"/>
                                                            </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">Aucun résultat trouvé</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Modale de confirmation -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                are you sure to delete this vehicle ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!--Script pour la confirmation de suppression-->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sélectionne tous les liens avec la classe "confirm-link"
        const confirmLinks = document.querySelectorAll('.confirm_link');
        const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        let targetUrl = '';

        confirmLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // Empêche la redirection par défaut
                targetUrl = this.getAttribute('data-url'); // Récupère l'URL cible

                // Affiche la modale de confirmation
                confirmModal.show();
            });
        });

        // Lorsqu'on clique sur "Confirmer" dans la modale
        document.getElementById('confirmDelete').addEventListener('click', function () {
            // Redirige vers l'URL cible
            window.location.href = targetUrl;
        });
    });
</script>

<?= $this->endSection() ?>
