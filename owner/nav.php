<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">UD. SUMBER SAUDARA</a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="member.php">Member</a></li>
                <li><a href="produk.php">Produk</a></li>
                <!-- <li><a href="sto.php">Laporan STO</a></li> -->
                <li><a href="penjualan.php">Laporan Penjualan</a></li>
                <!-- <li><a href="../k-means/">Cluster Penjualan</a></li> -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cluster Penjualan<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../k-means/">Proses K-Means</a></li>
                        <li><a href="sl.php">Hasil Clustering</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profil.php">Profil</a></li>
                <li><a href="logout.php"><span class=""></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>