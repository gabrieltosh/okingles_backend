<?php

use Illuminate\Database\Seeder;
use App\WebPage;
class SeedWebPage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            [
                'identifier'=>'contact_email',
                'value'=>'info@okaprendeingles.com.bo',
            ],
            [
                'identifier'=>'contact_number',
                'value'=>'76518845',
            ],
            [
                'identifier'=>'btn_login',
                'value'=>'Ingresar',
            ],
            [
                'identifier'=>'logo',
                'value'=>'logo2.png',
            ],
            [
                'identifier'=>'menu_1',
                'value'=>'Inicio'
            ],
            [
                'identifier'=>'menu_2',
                'value'=>'Eventos'
            ],
            [
                'identifier'=>'menu_3',
                'value'=>'Biblioteca Virtual'
            ],
            [
                'identifier'=>'menu_4',
                'value'=>'Aplicar Ahora'
            ],
            [
                'identifier'=>'menu_5',
                'value'=>'Noticias'
            ],
            [
                'identifier'=>'home_banner_1',
                'value'=>'banner.png'
            ],
            [
                'identifier'=>'home_banner_2',
                'value'=>'banner2.png'
            ],
            [
                'identifier'=>'home_banner_3',
                'value'=>'banner2.png'
            ],
            [
                'identifier'=>'home_text_banner_1',
                'value'=>'Boost up your skills <br> with a new way of <br> learning.'
            ],
            [
                'identifier'=>'home_text_banner_2',
                'value'=>'Boost up your skills <br> with a new way of <br> learning.'
            ],
            [
                'identifier'=>'home_text_banner_3',
                'value'=>'Boost up your skills <br> with a new way of <br> learning.'
            ],
            [
                'identifier'=>'home_subtitle_1',
                'value'=>'Popular Program'
            ],
            [
                'identifier'=>'home_subtitle_2',
                'value'=>'Latest Courses'
            ],
            [
                'identifier'=>'home_text_subtitle_2',
                'value'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br> veniam, quis nostrud exercitation.'
            ],
            [
                'identifier'=>'footer_title_1',
                'value'=>'Mantente Informado'
            ],
            [
                'identifier'=>'footer_title_2',
                'value'=>'Nuestras Redes Sociales'
            ],
            [
                'identifier'=>'footer_btn_1',
                'value'=>'Suscribite ahora'
            ],
            [
                'identifier'=>'footer_pld_1',
                'value'=>'Correo Electronico'
            ],
            [
                'identifier'=>'link_whatsapp',
                'value'=>''
            ],
            [
                'identifier'=>'link_facebook',
                'value'=>''
            ],
            [
                'identifier'=>'link_twitter',
                'value'=>''
            ],
            [
                'identifier'=>'link_instagram',
                'value'=>''
            ],
            [
                'identifier'=>'event_title',
                'value'=>'Eventos'
            ],
            [
                'identifier'=>'event_banner',
                'value'=>'bradcam.png'
            ],
            [
                'identifier'=>'library_title',
                'value'=>'Biblioteca Virtual'
            ],
            [
                'identifier'=>'library_text',
                'value'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'identifier'=>'news_title',
                'value'=>'Noticias'
            ],
            [
                'identifier'=>'news_text',
                'value'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'identifier'=>'apply_title',
                'value'=>'Aprende a hablar ingles con nosotros'
            ],
            [
                'identifier'=>'apply_img_1',
                'value'=>'1.png'
            ],
            [
                'identifier'=>'apply_img_2',
                'value'=>'2.png'
            ],
            [
                'identifier'=>'apply_txt_name',
                'value'=>'Nombres'
            ],
            [
                'identifier'=>'apply_txt_lastname',
                'value'=>'Apellido'
            ],
            [
                'identifier'=>'apply_txt_phone',
                'value'=>'Numero de Telefono'
            ],
            [
                'identifier'=>'apply_txt_email',
                'value'=>'Correo Electronico'
            ],
            [
                'identifier'=>'apply_btn_sent',
                'value'=>'Enviar'
            ],
            [
                'identifier'=>'apply_subtitle',
                'value'=>'Visitanos'
            ],
            [
                'identifier'=>'apply_address_1',
                'value'=>'Buttonwood, California.'
            ],
            [
                'identifier'=>'apply_address_2',
                'value'=>'Rosemead, CA 91770'
            ],
            [
                'identifier'=>'apply_phone_contact',
                'value'=>'76518845'
            ],
            [
                'identifier'=>'apply_open',
                'value'=>'Mon to Fri 9am to 6pm'
            ],
            [
                'identifier'=>'apply_email',
                'value'=>'support@colorlib.com'
            ],
            [
                'identifier'=>'apply_email_text',
                'value'=>'Send us your query anytime!'
            ],
        );
        WebPage::insert($data);
    }
}
