<section class="events-section">
    <div class="auto-container">
        <div class="row clearfix">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="col-inner">
                    <div class="sec-title with-separator">
                        <h2>Agenda Terkini</h2>
                        <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
                    </div>

                    <div class="carousel-box">

                        <?php

                        function namaBulan2($input)
                        {
                            if ($input == 'January') {
                                $output = 'Januari';
                            } elseif ($input == 'February') {
                                $output = 'Februari';
                            } elseif ($input == 'March') {
                                $output = 'Maret';
                            } elseif ($input == 'April') {
                                $output = 'April';
                            } elseif ($input == 'May') {
                                $output = 'Mei';
                            } elseif ($input == 'June') {
                                $output = 'Juni';
                            } elseif ($input == 'July') {
                                $output = 'Juli';
                            } elseif ($input == 'August') {
                                $output = 'Agustus';
                            } elseif ($input == 'September') {
                                $output = 'September';
                            } elseif ($input == 'October') {
                                $output = 'Oktober';
                            } elseif ($input == 'November') {
                                $output = 'November';
                            } elseif ($input == 'December') {
                                $output = 'Desember';
                            }

                            return $output;
                        };

                        function namaHari2($input)
                        {
                            if ($input == 'Sun') {
                                $output = 'Ahad';
                            } elseif ($input == 'Mon') {
                                $output = 'Senin';
                            } elseif ($input == 'Tue') {
                                $output = 'Selasa';
                            } elseif ($input == 'Wed') {
                                $output = 'Rabu';
                            } elseif ($input == 'Thu') {
                                $output = 'Kamis';
                            } elseif ($input == 'Fri') {
                                $output = 'Jum\'at';
                            } elseif ($input == 'Sat') {
                                $output = 'Sabtu';
                            }

                            return $output;
                        };

                        function namaWaktu($input)
                        {
                            if ($input == 0) {
                                $output = '00';
                            } elseif ($input == 1) {
                                $output = '01';
                            } elseif ($input == 2) {
                                $output = '02';
                            } elseif ($input == 3) {
                                $output = '03';
                            } elseif ($input == 4) {
                                $output = '04';
                            } elseif ($input == 5) {
                                $output = '05';
                            } elseif ($input == 6) {
                                $output = '06';
                            } elseif ($input == 7) {
                                $output = '07';
                            } elseif ($input == 8) {
                                $output = '08';
                            } elseif ($input == 9) {
                                $output = '09';
                            } else {
                                $output = $input;
                            }

                            return $output;
                        };

                        function namaKategori($kumpulanData, $input)
                        {
                            foreach ($kumpulanData as $data) {
                                if ($data->id == $input) {
                                    return $data->nama_media;
                                }
                            }
                        }

                        foreach ($agendaData as $no => $data) :
                        ?>

                            <div class="event-block">
                                <div class="inner-box">
                                    <div class="content-box">
                                        <div class="date-box">
                                            <div class="date">
                                                <span class="day"><?= date('d', strtotime($data['tanggal_acara'])) ?></span>
                                                <span class="month"><?= namaBulan2(date('F', strtotime($data['tanggal_acara']))) ?>
                                                    <br><?= date('Y', strtotime($data['tanggal_acara'])) ?></span>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="cat-info">
                                                <a><?= namaHari2(date('D', strtotime($data['tanggal_acara']))) ?>, Jam <?= namaWaktu($data['jam_acara']) ?>.<?= namaWaktu($data['menit_acara']) ?> WIB</a>
                                                <a style="background-color: orange;"><?= namaKategori($kategoriData, $data['id_kategori_agenda']) ?></a>
                                            </div>
                                            <h3><a><?= $data['nama_acara'] ?></a></h3>
                                            <div class="location">
                                                <?= $data['deskripsi_acara'] ?>
                                            </div>
                                            <div class="read-more mt-2 p-1">
                                                Tempat: <?= $data['lokasi'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>