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

use liderDeportivo\ExtranetBundle\Entity\Equipos;
use liderDeportivo\ExtranetBundle\Form\EquiposType;
use liderDeportivo\ExtranetBundle\Form\EquiposFilterType;

/**
 * Equipos controller.
 *
 * @Route("/equipos")
 */
class EquiposController extends Controller
{
    /**
     * Lists all Equipos entities.
     *
     * @Route("/", name="equipos")
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
        $filterForm = $this->createForm(new EquiposFilterType());
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('ExtranetBundle:Equipos')->createQueryBuilder('e');

        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('EquiposControllerFilter');
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
                $session->set('EquiposControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('EquiposControllerFilter')) {
                $filterData = $session->get('EquiposControllerFilter');
                $filterForm = $this->createForm(new EquiposFilterType(), $filterData);
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
            return $me->generateUrl('equipos', array('page' => $page));
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
     * Creates a new Equipos entity.
     *
     * @Route("/", name="equipos_create")
     * @Method("POST")
     * @Template("ExtranetBundle:Equipos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Equipos();
        $form = $this->createForm(new EquiposType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('equipos_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Equipos entity.
     *
     * @Route("/new", name="equipos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Equipos();
        $form   = $this->createForm(new EquiposType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Equipos entity.
     *
     * @Route("/{id}", name="equipos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExtranetBundle:Equipos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equipos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Equipos entity.
     *
     * @Route("/{id}/edit", name="equipos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExtranetBundle:Equipos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equipos entity.');
        }

        $editForm = $this->createForm(new EquiposType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Equipos entity.
     *
     * @Route("/{id}", name="equipos_update")
     * @Method("PUT")
     * @Template("ExtranetBundle:Equipos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExtranetBundle:Equipos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equipos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EquiposType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('equipos_edit', array('id' => $id)));
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
     * Deletes a Equipos entity.
     *
     * @Route("/{id}", name="equipos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ExtranetBundle:Equipos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Equipos entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('equipos'));
    }

    /**
     * Creates a form to delete a Equipos entity by id.
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
