<?php

namespace liderDeportivo\ExtranetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\View\TwitterBootstrapView;

use liderDeportivo\ExtranetBundle\Entity\Ligas;
use liderDeportivo\ExtranetBundle\Form\LigasType;
use liderDeportivo\ExtranetBundle\Form\LigasFilterType;



/**
 * Ligas controller.
 *
 * @Route("/ligas")
 */
class LigasController extends Controller
{
    /**
     * Lists all Ligas entities.
     *
     * @Route("/", name="ligas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        list($entities, $pagerHtml) = $this->paginator($queryBuilder);

        return array(
            'entities' => $entities,
            'pagerHtml' => $pagerHtml,
            'filterForm' => $filterForm->createView(),
        );
    }

    /**
    * Create filter form and process filter request.
    *
    */
    protected function filter()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $filterForm = $this->createForm(new LigasFilterType());
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('ExtranetBundle:Ligas')->createQueryBuilder('e');

        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('LigasControllerFilter');
        }

        // Filter action
        if ($request->get('filter_action') == 'filter') {
            // Bind values from the request
            $filterForm->bind($request);

            if ($filterForm->isValid()) {
                // Build the query from the given form object
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                // Save filter to session
                $filterData = $filterForm->getData();
                $session->set('LigasControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('LigasControllerFilter')) {
                $filterData = $session->get('LigasControllerFilter');
                $filterForm = $this->createForm(new LigasFilterType(), $filterData);
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
            }
        }

        return array($filterForm, $queryBuilder);
    }

    /**
    * Get results from paginator and get paginator view.
    *
    */
    protected function paginator($queryBuilder)
    {
        // Paginator
        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);
        $currentPage = $this->getRequest()->get('page', 1);
        $pagerfanta->setCurrentPage($currentPage);
        $entities = $pagerfanta->getCurrentPageResults();

        // Paginator - route generator
        $me = $this;
        $routeGenerator = function($page) use ($me)
        {
            return $me->generateUrl('ligas', array('page' => $page));
        };

        // Paginator - view
        $translator = $this->get('translator');
        $view = new TwitterBootstrapView();
        $pagerHtml = $view->render($pagerfanta, $routeGenerator, array(
            'proximity' => 3,
            'prev_message' => $translator->trans('views.index.pagprev', array(), 'JordiLlonchCrudGeneratorBundle'),
            'next_message' => $translator->trans('views.index.pagnext', array(), 'JordiLlonchCrudGeneratorBundle'),
        ));

        return array($entities, $pagerHtml);
    }

    /**
     * Creates a new Ligas entity.
     *
     * @Route("/", name="ligas_create")
     * @Method("POST")
     * @Template("ExtranetBundle:Ligas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Ligas();
        $form = $this->createForm(new LigasType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('ligas_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Ligas entity.
     *
     * @Route("/new", name="ligas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Ligas();
        $form   = $this->createForm(new LigasType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Ligas entity.
     *
     * @Route("/{id}", name="ligas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExtranetBundle:Ligas')->find($id);
        $campeonatos = $em->getRepository('ExtranetBundle:Campeonatos')->findByLiga($id);
        $ligaDisciplinas = $em->getRepository('ExtranetBundle:LigaDisciplina')->findByLiga($id);
        
        

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ligas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LigasType(), $entity);

        return array(
            'entity'      => $entity,
            'campeonatos' => $campeonatos,
            'ligaDisciplinas' => $ligaDisciplinas,
            'delete_form' => $deleteForm->createView(),
            'edit_form' => $editForm->createView(),
             
            
        );
    }

    /**
     * Displays a form to edit an existing Ligas entity.
     *
     * @Route("/{id}/edit", name="ligas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExtranetBundle:Ligas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ligas entity.');
        }

        $editForm = $this->createForm(new LigasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Ligas entity.
     *
     * @Route("/{id}", name="ligas_update")
     * @Method("PUT")
     * @Template("ExtranetBundle:Ligas:show.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExtranetBundle:Ligas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ligas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LigasType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('ligas_show', array('id' => $id)));
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.update.error');
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Ligas entity.
     *
     * @Route("/{id}", name="ligas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ExtranetBundle:Ligas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ligas entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('ligas'));
    }

    /**
     * Creates a form to delete a Ligas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
