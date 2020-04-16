<?php

namespace CourseBundle\Controller;


use CourseBundle\Form\courseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use CourseBundle\Entity\course;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use UserBundle\Entity\User;
use UserBundle\UserBundle;

class PostController extends Controller
{

    /**
     * @Route("/post", name="view_posts_route")
     */
    public function showAllPostsAction(Request $request)
    {
        // replace this example code with whatever you need
        $courses = $this->getDoctrine()->getRepository('CourseBundle:course')->findAll();
        return $this->render('pages/index.html.twig',['courses' => $courses]);
    }

    /**
     * @Route("/create", name="create_post_route")
     */
    public function createPostAction(Request $request)
    {
    }
    /**
     * @Route("/view/{id}", name="view_post_route")
     */
    public function viewPostAction($id)
    {
        // replace this example code with whatever you need
        return $this->render('pages/view.html.twig', [
        ]);
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


}
