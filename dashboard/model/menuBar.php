<!-- MENU SIDEBAR-->
<aside class="menu-sidebar2">
    <div class="logo">
        <a href="../index.php">
            <img src="../img/logoG.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="images/icon/avatar-big-01.jpg" alt="John Doe" />
            </div>
            <h4 class="name">john doe</h4>
            <a href="#">Sign out</a>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="dashboard">
                    <a href="admin.php">
                        <i class="fas fa-tachometer-alt"></i>Thống kê
                    </a>
                </li>
                <li class="receipt">
                    <a href="receiptTable.php">
                        <i class="fas fa-chart-bar"></i>Hóa đơn</a>
                    <span class="inbox-num">
                        <?php
                            require("./../XuLy/conSQL.php");
                            $sql = 'SELECT * FROM receipt WHERE receipt.status=0';
                            $rs = conSQL :: executeQuery($sql);
                            echo mysqli_num_rows($rs);
                        ?>
                    </span>
                </li>
                <li class="user">
                    <a href="userTable.php">
                        <i class="fas fa-users"></i>Tài khoản
                    </a>
                </li>
                <li class="product">
                    <a href="productTable.php">
                        <i class="fas fa-shopping-basket"></i>Sản phẩm
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->