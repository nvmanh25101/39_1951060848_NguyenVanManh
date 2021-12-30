<?php if(isset($_SESSION['error'])) { ?>
                    <p class="error"><?php echo $_SESSION['error'];?></p>
                <?php     
                        unset($_SESSION['error']);
                    }  
?>

<?php if(isset($_SESSION['success'])) { ?>
                    <p class="success"><?php echo $_SESSION['success']; ?></p>
                <?php     
                        unset($_SESSION['success']);
                    }  
?>