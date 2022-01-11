<footer>
            <ul class="pagination table__pagination justify-content-center">
                <?php for($i = 1; $i <= $num_page; $i++) { ?>
                    <li class="pagination-item
                        <?php if($i == $page) { echo 'pagination-item--active';} ?>
                    ">
                        <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>" class="pagination-item__link">
                            <?php echo $i ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </footer>
    </div>

<?php mysqli_close($connect) ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>