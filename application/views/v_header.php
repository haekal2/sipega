<nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url(); ?>">SIPEGA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <span class="nav-link"><?= anchor("c_start", "Home"); ?></span>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Referensi <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <span class="dropdown-item"><?= anchor("iotacrud/start/m_gender", "Kode Gender"); ?></span>
                        <div class="dropdown-divider"></div>
                        <span class="dropdown-item"><?= anchor("iotacrud/start/m_edulevel", "Kode Level Pendidikan"); ?></span>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pegawai <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <span class="dropdown-item"><?= anchor("iotacrud/start/m_pegawai", "Data Pribadi"); ?></span>
                        <div class="dropdown-divider"></div>
                        <span class="dropdown-item"><?= anchor("iotacrud/start/m_anakpeg", "Data Anak Pegawai"); ?></span>
                        <div class="dropdown-divider"></div>
                        <span class="dropdown-item"><?= anchor("iotacrud/start/m_edupeg", "Data Riwayat Pendidikan"); ?></span>
                    </div>
                </li>
                <li class="nav-item active">
                    <span class="nav-link"><?= anchor("iotacrud/start/m_hadirpeg", "Entri Kehadiran"); ?></span>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Laporan <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <span class="dropdown-item"><?= anchor("iotacrud/start/m_rptpeg", "Data Pegawai"); ?></span>
                        <div class="dropdown-divider"></div>
                        <span class="dropdown-item"><?= anchor("iotacrud/start/m_rpthadir", "Kehadiran Pegawai"); ?></span>
                    </div>
                </li>
                <li class="nav-item active">
                    <span class="nav-link"><?= anchor("c_about", "About"); ?></span>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div> <!-- /.navbar-collapse -->
    </div> <!-- /.container-fluid -->
</nav>