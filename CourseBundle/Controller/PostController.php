<?php

namespace CourseBundle\Controller;


use CourseBundle\Entity\Notification;
use CourseBundle\Form\courseType;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use CourseBundle\Entity\course;
use CourseBundle\Entity\Transport;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Tests\Fixtures\ToString;
use UserBundle\Entity\User;
use UserBundle\UserBundle;

class PostController extends Controller
{
    /**
 * @Route("/home", name="home_post_route")
 */
    public function homePostAction(Request $request)
    {  $nb=0;
        $user = $this->getUser();
     $x = $user->getUsername();
     $role= $user->getType();
        $date= (new \DateTime('now'));
     if( $role == "Client"){
        // $Notifications=$this->getDoctrine()->getRepository('CourseBundle:Notification')->findAll();
        $Notifications=$this->getDoctrine()->getRepository('CourseBundle:Notification')->findBy(array('destinateur' => $user));
       foreach($Notifications as $notification){
           if ($notification->getDestinateur()==$user){
               $nb=$nb+1;
           }

       }
        return $this->render('pages/home_page.html.twig', [
            'Notifications' => $Notifications,
            'x' =>$x,
            'nb'=>$nb
            ]
        );
   }elseif ($role == "Chauffeur"){
       return $this->render('pages/home_c.html.twig', [

               'x' =>$x
           ]
       );
   }elseif ($role == "Transporteur"){
       return $this->render('pages/home_Transporteur.html.twig', [
               'x' =>$x
           ]
       );
   } elseif ($role == "Admin"){
       return $this->render('pages/home_admin.html.twig', [
               'x' =>$x,
               'date' =>$date
           ]
       );
   } else{
       echo("Vous avez mal creer votre compte");
   }
    }
    /**
     * @Route("/Services", name="Servies_post_route")
     */
    public function ServicesPostAction()
    {
        // replace this example code with whatever you need
        return $this->render('pages/Services.html.twig', [
        ]);
    }
    /**
     * @Route("/ShowAdminColi", name="viewAdmin_colis_route")
     * @var $paginator \Knp\Component\Pager\Paginator
     *
     */
    public function showAdminColiPostsAction(Request $request)
    {
      $Transports  = $this->getDoctrine()->getRepository('CourseBundle:Transport')->findAll();
      $paginator = $this->get('knp_paginator');
      $result = $paginator->paginate(
          $Transports,
          $request->query->getInt('page',1),
          $request->query->getInt('limit',5)
      );



        return $this->render('pages/Views_coli.html.twig',['Transports' => $result]);
    }
    /**
     * @Route("/deleteclient/{id}", name="delete_client_route")
     */
    public function deleteclientPostAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->find($id);
        $em->remove($users);
        $em->flush();
        return $this->redirectToRoute('viewAdmin_clients_route');
    }
    /**
     * @Route("/deletechauffeur/{id}", name="delete_chauffeur_route")
     */
    public function deletechauffeurtPostAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->find($id);
        $em->remove($users);
        $em->flush();
        return $this->redirectToRoute('viewAdmin_chauffeur_route');
    }
    /**
     * @Route("/deleteTransporteur/{id}", name="delete_Transporteur_route")
     */
    public function deleteTransporteurPostAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->find($id);
        $em->remove($users);
        $em->flush();
        return $this->redirectToRoute('viewAdmin_Transporteur_route');
    }
    /**
     * @Route("/ShowAdminusers", name="viewAdmin_clients_route")
     * @var $paginator \Knp\Component\Pager\Paginator
     *
     */
    public function showAdminuserPostsAction(Request $request)
    {
        $users  = $this->getDoctrine()->getRepository('UserBundle:User')->findBy(array('type' => "Client"));
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $users,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );



        return $this->render('pages/Liste_User.html.twig',['users' => $result]);
    }
    /**
     * @Route("/ShowAdminchauffeur", name="viewAdmin_chauffeur_route")
     * @var $paginator \Knp\Component\Pager\Paginator
     *
     */
    public function showAdminuserchauffeursAction(Request $request)
    {
        $users  = $this->getDoctrine()->getRepository('UserBundle:User')->findBy(array('type' => "Chauffeur"));
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $users,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );



        return $this->render('pages/Liste_chauffeurs.html.twig',['users' => $result]);
    }
    /**
     * @Route("/ShowAdminTransporteur", name="viewAdmin_Transporteur_route")
     * @var $paginator \Knp\Component\Pager\Paginator
     *
     */
    public function showAdminTransporteurPostsAction(Request $request)
    {
        $users  = $this->getDoctrine()->getRepository('UserBundle:User')->findBy(array('type' => "Transporteur"));
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $users,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );



        return $this->render('pages/Liste_transporteur.html.twig',['users' => $result]);
    }

    /**
     * @Route("/post", name="viewsAdmincourses_route")
     * @var $paginator \Knp\Component\Pager\Paginator
     */
    public function showAdminPostsAction(Request $request)
    {
        // replace this example code with whatever you need
        $courses = $this->getDoctrine()->getRepository('CourseBundle:course')->findAll();

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $courses,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );
        return $this->render('pages/index.html.twig',['courses' =>$result]);
    }

    /**
     * @Route("/create", name="create_post_route")
     */
    public function createPostAction(Request $request)

    {

        $course=new course();
        $form = $this->createFormBuilder($course)
        ->add('pointDepart', TextType::class,array('attr'=>array('class'=>'form-control')))
        ->add('pointArrive', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('tel', TextType::class,array('attr'=>array('class'=>'form-control')))
        ->getform();
        $form->handleRequest($request);
        $user = $this->getUser();
        if($form->isSubmitted() && $form->isValid()){
           $pointDepart=$form['pointDepart']->getData();
            $pointArrive=$form['pointArrive']->getData();
            $tel=$form['tel']->getData();
            $Validation="Non";
            $non="Non";
            $raison="";
            $vu="Non";
            $course->setPointDepart($pointDepart);
            $course->setTel($tel);
            $course->setPointArrive($pointArrive);
            $course->setValidation($Validation);
            $course->setNon($non);
            $course->setRaison($raison);
            $course->setVu($vu);
            $course->setClient($user);
            $em=$this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();
            return $this->redirectToRoute('view_courseclient_route');
        }
        return $this->render('pages/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/viewClient", name="viewcoliclient_route")
     * @var $paginator \Knp\Component\Pager\Paginator
     */
    public function viewColiclientAction(Request $request)
        { $user = $this->getUser();
    $Transports=$this->getDoctrine()->getRepository('CourseBundle:Transport')->findBy(array('client' => $user));

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Transports,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );
        return $this->render('pages/ListeColisClient.html.twig',['Transports' => $result]);
    }
    /**
     * @Route("/view", name="view_courseclient_route")
     *  @var $paginator \Knp\Component\Pager\Paginator
     */
    public function viewCustomerAction(Request $request)
    {
        $user = $this->getUser();
        $courses = $this->getDoctrine()->getRepository('CourseBundle:course')->findBy(array('client' => $user));
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $courses,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );

        return $this->render('pages/view.html.twig',['courses' =>$result]);
    }

    /**
     * @Route("/viewT", name="view_transporteurcoli_route")
     */
    public function viewcolitransporteurAction(Request $request)
    {
        $Transports = $this->getDoctrine()->getRepository('CourseBundle:Transport')->findBy(array('validation'=>'non'));
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Transports,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );
        return $this->render('pages/ListeColi_transporteur.html.twig',['Transports' =>$result]);
    }
    /**
     * @Route("/viewchauffeur", name="viewchauffeur_post_route")
     */
    public function viewchauffeurPostAction(Request $request)
    {
        $courses = $this->getDoctrine()->getRepository('CourseBundle:course')->findBy(array('validation'=>'non'));
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $courses,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );

        return $this->render('pages/Viewchauffeur.html.twig',['courses' => $result]);
    }
    /**
     * @Route("/edit/{id}", name="edit_post_route")
     */
    public function editPostAction($id)
    {
        // replace this example code with whatever you need
        return $this->render('pages/edit.html.twig', [
        ]);
    }


    /**
     * @Route("/ValidColi/{id}", name="validColi_route")
     */
    public function ValidColiAction(Request $request,$id)
    {
        $vu='oui';
        $validation='oui';


       /* $form = $this->createFormBuilder($Transport)
            ->add('save',SubmitType::class,array('label'=>'Accepter','attr'=>array('class' =>'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);*/


        $user = $this->getUser();
      /*  if($form->isSubmitted() && $form->isValid()){*/

            $Transport=$this->getDoctrine()->getRepository('CourseBundle:Transport')->find($id);
            $Transport->setValidation($validation);
            $Transport->setVu($vu);
            $Transport->setTransporteur($user);

            $em=$this->getDoctrine()->getManager();
            $em->persist($Transport);
            $em->flush();
        $notification = new Notification();
        $notification
            ->setTitle('validation transfert de coli')
            ->setDescription(' Votre demande de transfert de coli est bien valider')
            ->setRoute('viewchauffeur_post_route')
            ->setParameters(array('id' => $Transport->getId()))
            ->setDestinateur($Transport->getClient());
        ;
        $em->persist($notification);
        $em->flush();
        $pusher = $this->get('mrad.pusher.notificaitons');
        $pusher->trigger($notification);
            return $this->redirectToRoute('view_transporteurcoli_route'); }
       /* return $this->render('pages/Valid.html.twig', [
            'form' => $form->createView()
        ]);
    }*/
    /**
     * @Route("/validcourse/{id}", name="validcourse_post_route")
     */
    public function validcoursePostAction(Request $request, $id)
    { $vu='oui';
        $validation='oui';
        $user = $this->getUser();
             $course=$this->getDoctrine()->getRepository('CourseBundle:course')->find($id);
         $course->setValidation($validation);
         $course->setVu($vu);
          $course->setChauffeur($user);
             $em=$this->getDoctrine()->getManager();
        $em->persist($course);
         $em->flush();
         $notification = new Notification();
         $notification
             ->setTitle('Validation de votre course')
             ->setDescription(' Votre demande est bien valider')
             ->setRoute('viewchauffeur_post_route')
             ->setParameters(array('id' => $course->getId()))
             ->setDestinateur($course->getClient());
         ;
        $em->persist($notification);
        $em->flush();
        $pusher = $this->get('mrad.pusher.notificaitons');
        $pusher->trigger($notification);

        return $this->redirectToRoute('viewchauffeur_post_route'); }


     /**
 * @Route("/deletec/{id}", name="delete_post_route")
 */
    public function deletecoursePostAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $courses = $em->getRepository('CourseBundle:course')->find($id);
        $em->remove($courses);
        $em->flush();
        return $this->redirectToRoute('viewsAdmincourses_route');
    }


    /**
     * @Route("/deletecoli/{id}", name="delete_coli_route")
     */
    public function deletecolisPostAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Transports = $em->getRepository('CourseBundle:Transport')->find($id);
        $em->remove($Transports);
        $em->flush();
        return $this->redirectToRoute('viewAdmin_colis_route');
    }
    /**
     * @Route("/Valid/{id}", name="valid_post_route")
     */
    public function ValidPostAction($id)
    {
        // replace this example code with whatever you need
        return $this->render('Valider.html.twig', [
        ]);
    }
    /**
     * @Route("/Refuse/{id}", name="refuse_post_route")
     */
    public function RefusePostAction($id)
    {
        // replace this example code with whatever you need
        return $this->render('pages/Refuse.html.twig', [
        ]);
    }

    /**
     * @Route("/create_coli", name="create_colis_route")
     */
    public function createColiPostsAction(Request $request)
    {

        $transport=new Transport();
        $form = $this->createFormBuilder($transport)
            ->add('pointdepart', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('pointArrive', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('descrption', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('tel', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('autretel', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->getform();
        $form->handleRequest($request);
        $user = $this->getUser();
        if($form->isSubmitted() && $form->isValid()){
            $pointdepart=$form['pointdepart']->getData();
            $descrption=$form['descrption']->getData();
            $pointArrive=$form['pointArrive']->getData();
            $tel=$form['tel']->getData();
            $autretel=$form['autretel']->getData();
            $Validation="Non";
            $vu="Non";
            $transport->setPointdepart($pointdepart);
            $transport->setPointArrive($pointArrive);
            $transport->setValidation($Validation);
            $transport->setTel($tel);
            $transport->setAutretel($autretel);
            $transport->setDescrption( $descrption);
            $transport->setVu($vu);
            $transport->setClient($user);
            $em=$this->getDoctrine()->getManager();
            $em->persist($transport);
            $em->flush();
            return $this->redirectToRoute('viewcoliclient_route');
        }
        return $this->render('pages/create_coli.html.twig', [
            'form' => $form->createView()
        ]);
    }


    public function pdfAction($id)
{
    $em= $this->getDoctrine()->getManager();

    $course =$em->getRepository('CourseBundle:course')->find($id);
    $snappy = $this->get('knp_snappy.pdf');
    $html = $this->renderView('pages/pdf.html.twig',
        ['course'=> $course]

    );

    $filename = 'mesCoursePDF';

    return new Response(
        $snappy->getOutputFromHtml($html),
        200,
        [
            'Content-Type'          => 'application/pdf',
            'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"']

    );
}
    /**
     * @Route("/pdfcoli/{id}", name="pdfcoli_route")
     */
    public function pdfcoliAction($id)
    {
        $em= $this->getDoctrine()->getManager();

        $Transport =$em->getRepository('CourseBundle:Transport')->find($id);
        $snappy = $this->get('knp_snappy.pdf');
        $html = $this->renderView('pages/pdfcoli.html.twig',
            ['Transport'=> $Transport]

        );

        $filename = 'mesTransfertPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            [
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"']

        );
    }
    public function statistiqueAction(Request $request)
    {
        $pieChart=new PieChart();
        $em=$this->getDoctrine();
        $courses=$em->getRepository(course::class)->findAll();
        $totalcourses=0;
        $nonvalidercourse=0;
        $somme=0;
        foreach ($courses as $courses){
            if($courses->getValidation() == "oui")
            {
                $totalcourses=$totalcourses+1;
            }else{

                $nonvalidercourse=$nonvalidercourse+1;
            }
            $somme=$somme+1;
        }


        $validercourses = $em->getRepository(course::class)->findBy(array('validation' => 'oui'));
        $data=array();
        $stat=['validation','valider'];
        $nb=0;
        array_push($data,$stat);
        foreach($validercourses as $validers){
            $stat=array();
            array_push($stat,'oui',(($totalcourses *100)/$somme));
            $nb=($totalcourses *100)/$somme;
            $stat=[$validers->getValidation(),$nb];
            array_push($data,$stat);
        }


        $validerecourse = $em->getRepository(course::class)->findBy(array('validation' => 'Non'));
        $data=array();
        $stat=['validation','non valider'];
        $nbb=0;
        array_push($data,$stat);
        foreach($validerecourse as $validers){
            $stat=array();
            array_push($stat,'Non',(($nonvalidercourse *100)/$somme));
            $nbb=($nonvalidercourse *100)/$somme;
            $stat=[$validers->getValidation(),$nbb];
            array_push($data,$stat);
        }


        $pieChart->getData()->setArrayToDataTable(
            [
                ['validation', 'valider'],
                ['courses Valider', $nb],
                ['courses non Valider',$nbb]


            ]
        );

        // $pieChart->getOptions()->setTitle('Pourcentages des Produits par Categorie');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(750);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('@Course\Default\statistique.html.twig', array('piechart' => $pieChart));

    }

    /**
     * @Route("/statcoli", name="statestique_colis_route")
     */
    public function statistiqueColiAction(Request $request)
    {
        $pieChart=new PieChart();
        $em=$this->getDoctrine();
        $cours=$em->getRepository(Transport::class)->findAll();
        $somme=0;
        $total=0;
        $nonvalider=0;
        foreach ($cours as $courses){
            if($courses->getValidation() == "oui")
            {
                $total = $total+1;
            }else{
                $nonvalider=$nonvalider+1;
            }
            $somme=$somme+1;
        }


            $valider = $em->getRepository(Transport::class)->findBy(array('validation' => 'oui'));
        $data=array();
        $stat=['validation','valider'];
        $nb=0;
        array_push($data,$stat);
        foreach($valider as $validers){
            $stat=array();
            array_push($stat,'oui',(($total *100)/$somme));
            $nb=($total *100)/$somme;
            $stat=[$validers->getValidation(),$nb];
            array_push($data,$stat);
        }


        $validere = $em->getRepository(Transport::class)->findBy(array('validation' => 'Non'));
        $data=array();
        $stat=['validation','non valider'];
        $nbb=0;
        array_push($data,$stat);
        foreach($validere as $validers){
            $stat=array();
            array_push($stat,'Non',(($nonvalider *100)/$somme));
            $nbb=($nonvalider *100)/$somme;
            $stat=[$validers->getValidation(),$nbb];
            array_push($data,$stat);
        }


        $pieChart->getData()->setArrayToDataTable(
            [
                ['validation', 'valider'],
                ['demandes validés', $nb],
                ['demandes non validés',$nbb]


            ]
        );

        // $pieChart->getOptions()->setTitle('Pourcentages des Produits par Categorie');
        $pieChart->getOptions()->setHeight(700);
        $pieChart->getOptions()->setWidth(750);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('@Course\Default\statistique1.html.twig', array('piechart' => $pieChart));

    }


    /**
     * @Route("/statuser", name="statestique_user_route")
     */
    public function statistiqueuserAction(Request $request)
    {
        $pieChart=new PieChart();
        $em=$this->getDoctrine();
        $urs=$em->getRepository(User::class)->findAll();
        $somme=0;
        $totalclient=0;
        $totaltr=0;
        $totalcauf=0;
        foreach ($urs as $urses){
            if($urses->gettype() == "Client")
            {
                $totalclient = $totalclient+1;
            }elseif($urses->gettype() == "Chauffeur"){
                $totalcauf=$totalcauf+1;
            }elseif($urses->gettype() == "Transporteur"){

                $totaltr = $totaltr+1;
            }
            $somme=$somme+1;
        }
        $valider = $em->getRepository(User::class)->findBy(array('type' => 'Client'));
        $data=array();
        $stat=['validation','valider'];

        array_push($data,$stat);
        foreach($valider as $validers){
            $stat=array();
            array_push($stat,'Client',(($totalclient *100)/$somme));
            $nb=($totalclient *100)/$somme;
            $stat=[$validers->getType(),$nb];
            array_push($data,$stat);
        }
        $validertr = $em->getRepository(User::class)->findBy(array('type' => 'Transporteur'));
        $data=array();
        $stat=['validation','non valider'];
        $nbb=0;
        array_push($data,$stat);
        foreach($validertr as $validerc){
            $stat=array();
            array_push($stat,'Transporteur',(($totaltr *100)/$somme));
            $nbc=($totaltr *100)/$somme;
            $stat=[$validerc->getType(),$nbb];
            array_push($data,$stat);
        }
        $validereuser = $em->getRepository(User::class)->findBy(array('type' => 'Chauffeur'));
        $data=array();
        $stat=['user','type'];

        array_push($data,$stat);
        foreach($validereuser as $validers){
            $stat=array();
            array_push($stat,'Chauffeur',(($totalcauf *100)/$somme));
            $nbb=($totalcauf *100)/$somme;
            $stat=[$validers->getType(),$nbb];
            array_push($data,$stat);
        }

        $pieChart->getData()->setArrayToDataTable(
            [
                ['validation', 'type'],
                ['les clients de votre application', $nb],
                ['les chauffeurs de votre application',$nbb],
                ['les transporteur de votre application',$nbc]
            ]
        );

        // $pieChart->getOptions()->setTitle('Pourcentages des Produits par Categorie');
        $pieChart->getOptions()->setHeight(700);
        $pieChart->getOptions()->setWidth(750);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('@Course\Default\statistiquechauffeur.html.twig', array('piechart' => $pieChart));

    }


}


