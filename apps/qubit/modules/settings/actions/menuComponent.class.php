<?php

/*
 * This file is part of the Access to Memory (AtoM) software.
 *
 * Access to Memory (AtoM) is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Access to Memory (AtoM) is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Access to Memory (AtoM).  If not, see <http://www.gnu.org/licenses/>.
 */

class SettingsMenuComponent extends sfComponent
{
  public function execute($request)
  {
    $this->nodes = array(
      array(
        'label' => $this->context->i18n->__('Global'),
        'action' => 'global'
      ),
      array(
        'label' => $this->context->i18n->__('Site information'),
        'action' => 'siteInformation'
      ),
      array(
        'label' => $this->context->i18n->__('Default page elements'),
        'action' => 'pageElements'
      ),
      array(
        'label' => $this->context->i18n->__('Default template'),
        'action' => 'template'
      ),
      array(
        'label' => $this->context->i18n->__('User interface labels'),
        'action' => 'interfaceLabel'
      ),
      array(
        'label' => $this->context->i18n->__('I18n languages'),
        'action' => 'language'
      ),
      array(
        'label' => $this->context->i18n->__('OAI repository'),
        'action' => 'oai',
        'hide' => !$this->context->getConfiguration()->isPluginEnabled('arOaiPlugin')
      ),
      array(
        'label' => $this->context->i18n->__('Finding Aid'),
        'action' => 'findingAid'
      ),
      array(
        'label' => $this->context->i18n->__('Security'),
        'action' => 'security'
      ),
      array(
        'label' => $this->context->i18n->__('Permissions'),
        'action' => 'permissions'
      ),
      array(
        'label' => $this->context->i18n->__('Inventory'),
        'action' => 'inventory'
      ),
      array(
        'label' => $this->context->i18n->__('Digital object derivatives'),
        'action' => 'digitalObjectDerivatives'
      ),
      array(
        'label' => $this->context->i18n->__('DIP upload'),
        'action' => 'dipUpload'
      )
    );

    foreach ($this->nodes as $i => &$node)
    {
      // Remove hidden nodes
      if (!empty($node['hide']) && true === $node['hide'])
      {
        unset($this->nodes[$i]);
      }

      // Active bool
      $node['active'] = $this->context->getActionName() === $node['action'];
    }
  }
}