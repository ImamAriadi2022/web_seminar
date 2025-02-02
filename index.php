<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webinar Online</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="font/fontawesome/css/all.min.css">
</head>

<body>
    <?php
    include 'function.php';

    $user = session_profile_user();
    $authentikasi = auth_check_token(!empty($_SESSION['auth_token']) ? $_SESSION['auth_token'] : '');
    $event_up = event_upcoming();
    ?>
    <div class="loading_wrapper">
        <div class="loading">
            <i class="fa-solid fa-hourglass-half"></i>
        </div>
    </div>
    <div class="notif">
        <div class="box_notif">
            <div class="icon_notif"></div>
            <div class="text_notif">
                <div class="wrap_message">
                    <span id="title_notif"></span>
                    <span id="message_notif"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="dialog_background">
        <div class="wrap_dialog">
            <div class="dialog_confirm">
                <form action="action/action_regis_seminar.php" id="ajax-regis">
                    <div class="dialog_header">
                        <h3>Daftar Seminar</h3>
                        <button type="button" class="btn_close_dialog">
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </div>
                    <div class="dialog_body">
                        Apakah anda yakin ingin mendaftar seminar?
                    </div>
                    <div class="dialog_footer">
                        <button type="button" class="btn_close_dialog">Tutup</button>
                        <button type="submit">Ya, Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="beranda">
        <?php
        include 'component/navbar_index.php';
        include 'component/sidebar_index.php';
        ?>

        <div class="container_index">
            <div class="container_index_pd">
                <section class="content">
                    <div class="box_banner">
                        <div class="banner_overflow">
                            <img src="img/Dark Teal Geometric Technology LinkedIn Banner.png" alt="">
                        </div>
                    </div>

                    <div class="row_divisi">
                        <div class="row">
                            <div class="box_divisi">
                                <div class="divisi"
                                    style="background-image: url('https://img.freepik.com/free-photo/person-front-computer-working-html_23-2150040412.jpg');">
                                </div>
                                <div class="text_divisi">
                                    Front-End Web<br> Developer
                                </div>
                            </div>
                            <div class="box_divisi">
                                <div class="divisi"
                                    style="background-image: url('https://cdn.pixabay.com/photo/2021/08/04/13/06/software-developer-6521720_1280.jpg');">
                                </div>
                                <div class="text_divisi">
                                    Back-End<br> Developer
                                </div>
                            </div>
                            <div class="box_divisi">
                                <div class="divisi"
                                    style="background-image: url('https://media.istockphoto.com/id/1196702694/photo/designers-drawing-website-ux-app-development.jpg?b=1&s=612x612&w=0&k=20&c=ZYuGCDVwrYDymSDf15JNMURA7ZihcYGHuzp9BEqJADU=');">
                                </div>
                                <div class="text_divisi">
                                    Ui Ux<br> Developer
                                </div>
                            </div>
                            <div class="box_divisi">
                                <div class="divisi"
                                    style="background-image: url('https://cdn.prod.website-files.com/6100d0111a4ed76bc1b9fd54/6283c5726504418719a40059_mobile%20developer%205.jpeg');">
                                </div>
                                <div class="text_divisi">
                                    Mobile<br> Developer
                                </div>
                            </div>
                            <div class="box_divisi">
                                <div class="divisi"
                                    style="background-image: url('https://minio.pijarmahir.id/article/0c4c67ac-264c-446f-95fa-e13191ba02c1.jpg');">
                                </div>
                                <div class="text_divisi">
                                    Data<br> Analyst
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="registrasi_seminar">
                        <div class="title_registrasi">
                            <h1>Events Mendatang</h1>
                            <a href="">Lihat Selengkapnya </a>
                        </div>
                        <div class="wrap_box_seminar">
                            <?php foreach ($event_up as $event) { ?>

                                <div class="box_seminar">
                                    <div class="wrap_thumbnail">
                                        <img src="thumbnail/<?= $event['thumbnail'] ?>" class="img_thumbnail"
                                            alt="Thumbnail_image">
                                    </div>
                                    <div class="wrap_text_detail">
                                        <div class="detail_seminar">
                                            <div class="title_seminar">
                                                <h1><?= $event['judul_seminar'] ?></h1>
                                            </div>
                                            <div class="waktu_seminar">
                                                <span><?= $event['waktu_seminar'] ?> WIB</span>
                                            </div>
                                        </div>
                                        <button class="btn_regis_seminar"
                                            data-id="<?= $event['seminar_id'] ?>">Daftar</button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>

    <div class="btn_scroll_top">
        <div class="wrap_btn_scroll">
            <i class="fa-solid fa-angle-up"></i>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script>
        $(window).on('load', function () {
            setTimeout(function () {
                $('.loading_wrapper').fadeOut(500);
            }, 500);
        });
    </script>
    <script>
        $(document).ready(function () {
            let navbar = $('.navbar_index')

            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 0) {
                    navbar.addClass('navbar_shadow');
                    $('.center_navbar').css('padding', '1rem 5rem');

                    if ($(this).scrollTop() > 100) {
                        $('.btn_scroll_top').css('right', '20px');
                    } else {
                        $('.btn_scroll_top').css('right', '-50px');
                    }
                } else {
                    navbar.removeClass('navbar_shadow');
                    $('.center_navbar').css('padding', '1.5rem 5rem');
                }
            });

            $('.btn_regis_seminar').click(function () {
                let confirm = $('.dialog_background');
                let id = $(this).data('id');
                let form = $('#ajax-regis');
                form.attr('action', 'action/action_regis_seminar.php?id=' + id);
                confirm.fadeIn(300);
            });

            $('.btn_close_dialog').click(function () {
                let confirm = $('.dialog_background');
                let form = $('#ajax-regis');
                form.attr('action', 'action/action_regis_seminar.php');
                confirm.fadeOut(300);
            });

            $('#ajax-regis').submit(function (e) {
                e.preventDefault();
                let url = $(this).attr('action');
                $.ajax({
                    url: url,
                    dataType: 'JSON',
                    beforeSend: function () {
                        $('.dialog_background').fadeOut(300);
                    },
                    success: function (response) {
                        if (response.status == 'success') {
                            $('.icon_notif').empty().append(response.icon);
                            $('#title_notif').text('Success !');
                            $('#message_notif').text(response.message);
                            $('.notif').css({ 'background-color': '#74b574e2' }).fadeIn(300);
                            setTimeout(function () {
                                $('.notif').fadeOut(800);
                            }, 1500);

                            setTimeout(function () {
                                if (response.redirect != '') {
                                    location.href = response.redirect;
                                } else {
                                    location.reload();
                                }
                            }, 1500);
                        } else {
                            $('.icon_notif').empty().append(response.icon);
                            $('#title_notif').text('Failed !');
                            $('#message_notif').text(response.message);
                            $('.notif').css({ 'background-color': '#c85c57' }).fadeIn(300);
                            setTimeout(function () {
                                $('.notif').fadeOut(800);
                            }, 2000);

                            setTimeout(function () {
                                if (response.redirect != '') {
                                    location.href = response.redirect;
                                } else {
                                    location.reload();
                                }
                            }, 2000);
                        }
                    }
                });
            });

            $('.btn_hamburger').click(function () {
                let sidebar = $('.sidebar_index');
                let right = $('.sidebar_index').css('right');

                if (right == '0px') {
                    sidebar.removeClass('sidebar_index_show');
                    $('body').css('overflow-y', 'auto');
                } else {
                    sidebar.addClass('sidebar_index_show');
                    $('body').css('overflow-y', 'hidden');
                }
            });

            $('.btn_scroll_top').click(function () {
                $('html').animate({ scrollTop: '-=50' }, 'slow').animate({ scrollTop: 0 }, 300);
            });

            $('.button_dropdown').click(function () {
                let display = $('.dropdown_profile').css('display');
                if (display == 'none') {
                    $('.dropdown_profile').fadeIn(200);
                } else {
                    $('.dropdown_profile').fadeOut(0);
                }
            });

        });
    </script>
</body>

</html>