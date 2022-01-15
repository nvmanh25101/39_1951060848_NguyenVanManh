<div class="header">
                <div class="header_left">
                    <i class="bi bi-arrow-left"></i>
                    <i class="bi bi-arrow-right" style="margin-left: 20px;"></i>
                </div>
                <div class="header_search">
                  <i class="bi bi-search"></i>
                  <form action="" class="header_search-form">
                      <input type="search" name="search" class="header_search-input" value="<?= $search ?>"placeholder="Nhập tên bài hát, nghệ sĩ hoặc MV...">
                  </form>
                </div>
                <div class="header_right">
                    <div class="header__topic">
                        <svg width="20" height="20" class="header__nav-icon" viewBox="0 0 20 20"><defs><linearGradient id="j32lhg93hd" x1="62.206%" x2="18.689%" y1="70.45%" y2="39.245%"><stop offset="0%" stop-color="#F81212"></stop><stop offset="100%" stop-color="red"></stop></linearGradient><linearGradient id="hjoavsus6g" x1="50%" x2="11.419%" y1="23.598%" y2="71.417%"><stop offset="0%" stop-color="#00F"></stop><stop offset="100%" stop-color="#0031FF"></stop></linearGradient><linearGradient id="la1y5u3dvi" x1="65.655%" x2="25.873%" y1="18.825%" y2="56.944%"><stop offset="0%" stop-color="#FFA600"></stop><stop offset="100%" stop-color="orange"></stop></linearGradient><linearGradient id="2dsmrlvdik" x1="24.964%" x2="63.407%" y1="8.849%" y2="55.625%"><stop offset="0%" stop-color="#13EFEC"></stop><stop offset="100%" stop-color="#00E8DF"></stop></linearGradient><filter id="4a7imk8mze" width="230%" height="230%" x="-65%" y="-65%" filterUnits="objectBoundingBox"><feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur></filter><filter id="301mo6jeah" width="312.7%" height="312.7%" x="-106.4%" y="-106.4%" filterUnits="objectBoundingBox"><feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur></filter><filter id="b2zvzgq7fj" width="295%" height="295%" x="-97.5%" y="-97.5%" filterUnits="objectBoundingBox"><feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur></filter><filter id="a1wq161tvl" width="256%" height="256%" x="-78%" y="-78%" filterUnits="objectBoundingBox"><feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur></filter><path id="qtpqrj1oda" d="M3.333 14.167V5.833l-1.666.834L0 3.333 3.333 0h3.334c.04 1.57.548 2.4 1.524 2.492l.142.008C9.403 2.478 9.958 1.645 10 0h3.333l3.334 3.333L15 6.667l-1.667-.834v8.334h-10z"></path><path id="jggzvnjgfc" d="M0 0H20V20H0z"></path><path id="2eiwxjmc7m" d="M3.333 14.167V5.833l-1.666.834L0 3.333 3.333 0h3.334c.04 1.57.548 2.4 1.524 2.492l.142.008C9.403 2.478 9.958 1.645 10 0h3.333l3.334 3.333L15 6.667l-1.667-.834v8.334h-10z"></path></defs><g fill="none" fill-rule="evenodd" transform="translate(2 3)"><mask id="tinejqaasb" fill="#fff"><use xlink:href="#qtpqrj1oda"></use></mask><use fill="#FFF" fill-opacity="0" xlink:href="#qtpqrj1oda"></use><g mask="url(#tinejqaasb)"><g transform="translate(-2 -3)"><mask id="uf3ckvfvpf" fill="#fff"><use xlink:href="#jggzvnjgfc"></use></mask><use fill="#D8D8D8" xlink:href="#jggzvnjgfc"></use><circle cx="8.9" cy="6.8" r="9" fill="url(#j32lhg93hd)" filter="url(#4a7imk8mze)" mask="url(#uf3ckvfvpf)"></circle><circle cx="9.3" cy="13.7" r="5.5" fill="url(#hjoavsus6g)" filter="url(#301mo6jeah)" mask="url(#uf3ckvfvpf)"></circle><circle cx="15.9" cy="6.9" r="6" fill="url(#la1y5u3dvi)" filter="url(#b2zvzgq7fj)" mask="url(#uf3ckvfvpf)"></circle><circle cx="16.4" cy="17.7" r="7.5" fill="url(#2dsmrlvdik)" filter="url(#a1wq161tvl)" mask="url(#uf3ckvfvpf)"></circle></g></g><use fill="#FFF" fill-opacity="0.05" xlink:href="#2eiwxjmc7m"></use></g></svg>
                    </div>
                    <div class="header__upload" , title="Tải lên">
                       <span class="material-icons-outlined">file_upload</span>
                    </div>
                    <div class="header__setting" , title="Cài đặt">
                       <span class="material-icons-outlined">settings</span>
                    </div>
                    <div class="header__avatar">
                        <?php if(isset($_SESSION['id'])) { ?>
                            <img src="./assets/images/users/<?php echo $_SESSION['image']?>" class="header__avatar-img" alt="avatar">
                            <ul class="header__avatar-menu">
                                <li>
                                    <a href="./signout.php" class="header__avatar-link">Đăng xuất</a>
                                </li>
                            </ul>
                        <?php } else {?>
                            <i class="bi bi-person-circle" style="color: #cdd6da;"></i>
                            <ul class="header__avatar-menu">
                                <li>
                                   <a href="./signin.php" class="header__avatar-link">Đăng nhập</a>
                                </li>
                                <li>
                                   <a href="./signup.php" class="header__avatar-link">Đăng ký</a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
