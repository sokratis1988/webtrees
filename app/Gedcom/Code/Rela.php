<?php
namespace Fisharebest\Webtrees;

/**
 * webtrees: online genealogy
 * Copyright (C) 2015 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Class WT_Gedcom_Code_Rela - Functions and logic for GEDCOM "RELA" codes
 */
class WT_Gedcom_Code_Rela {

	/** @var string[] List of possible values for the RELA tag */
	private static $TYPES = array(
		'attendant', 'attending', 'best_man', 'bridesmaid', 'buyer',
		'circumciser', 'civil_registrar', 'employee', 'employer', 'foster_child',
		'foster_father', 'foster_mother', 'friend', 'godfather', 'godmother',
		'godparent', 'godson', 'goddaughter', 'godchild', 'guardian',
		'informant', 'lodger', 'nanny', 'nurse', 'owner',
		'priest', 'rabbi', 'registry_officer', 'seller', 'servant',
		'slave', 'ward', 'witness',
	);

	/**
	 * Translate a code, for an (optional) record.
	 * We need the record to translate the sex (godfather/godmother) but
	 * we won’t have this when adding data for new individuals.
	 *
	 * @param string            $type
	 * @param GedcomRecord|null $record
	 *
	 * @return string
	 */
	public static function getValue($type, GedcomRecord $record = null) {
		if ($record instanceof Individual) {
			$sex = $record->getSex();
		} else {
			$sex = 'U';
		}

		switch ($type) {
		case 'attendant':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Attendant');
			case 'F':
				return I18N::translate_c('FEMALE', 'Attendant');
			default:
				return I18N::translate('Attendant');
			}
		case 'attending':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Attending');
			case 'F':
				return I18N::translate_c('FEMALE', 'Attending');
			default:
				return I18N::translate('Attending');
			}
		case 'best_man':
			// always male
			return I18N::translate('Best man');
		case 'bridesmaid':
			// always female
			return I18N::translate('Bridesmaid');
		case 'buyer':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Buyer');
			case 'F':
				return I18N::translate_c('FEMALE', 'Buyer');
			default:
				return I18N::translate('Buyer');
			}
		case 'circumciser':
			// always male
			return I18N::translate('Circumciser');
		case 'civil_registrar':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Civil registrar');
			case 'F':
				return I18N::translate_c('FEMALE', 'Civil registrar');
			default:
				return I18N::translate('Civil registrar');
			}
		case 'employee':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Employee');
			case 'F':
				return I18N::translate_c('FEMALE', 'Employee');
			default:
				return I18N::translate('Employee');
			}
		case 'employer':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Employer');
			case 'F':
				return I18N::translate_c('FEMALE', 'Employer');
			default:
				return I18N::translate('Employer');
			}
		case 'foster_child':
			// no sex implied
			return I18N::translate('Foster child');
		case 'foster_father':
			// always male
			return I18N::translate('Foster father');
		case 'foster_mother':
			// always female
			return I18N::translate('Foster mother');
		case 'friend':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Friend');
			case 'F':
				return I18N::translate_c('FEMALE', 'Friend');
			default:
				return I18N::translate('Friend');
			}
		case 'godfather':
			// always male
			return I18N::translate('Godfather');
		case 'godmother':
			// always female
			return I18N::translate('Godmother');
		case 'godparent':
			// no sex implied
			return I18N::translate('Godparent');
		case 'godson':
			// always male
			return I18N::translate('Godson');
		case 'goddaughter':
			// always female
			return I18N::translate('Goddaughter');
		case 'godchild':
			// no sex implied
			return I18N::translate('Godchild');
		case 'guardian':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Guardian');
			case 'F':
				return I18N::translate_c('FEMALE', 'Guardian');
			default:
				return I18N::translate('Guardian');
			}
		case 'informant':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Informant');
			case 'F':
				return I18N::translate_c('FEMALE', 'Informant');
			default:
				return I18N::translate('Informant');
			}
		case 'lodger':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Lodger');
			case 'F':
				return I18N::translate_c('FEMALE', 'Lodger');
			default:
				return I18N::translate('Lodger');
			}
		case 'nanny':
			// no sex implied
			return I18N::translate('Nanny');
		case 'nurse':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Nurse');
			case 'F':
				return I18N::translate_c('FEMALE', 'Nurse');
			default:
				return I18N::translate('Nurse');
			}
		case 'owner':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Owner');
			case 'F':
				return I18N::translate_c('FEMALE', 'Owner');
			default:
				return I18N::translate('Owner');
			}
		case 'priest':
			// no sex implied
			return I18N::translate('Priest');
		case 'rabbi':
			// always male
			return I18N::translate('Rabbi');
		case 'registry_officer':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Registry officer');
			case 'F':
				return I18N::translate_c('FEMALE', 'Registry officer');
			default:
				return I18N::translate('Registry officer');
			}
		case 'seller':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Seller');
			case 'F':
				return I18N::translate_c('FEMALE', 'Seller');
			default:
				return I18N::translate('Seller');
			}
		case 'servant':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Servant');
			case 'F':
				return I18N::translate_c('FEMALE', 'Servant');
			default:
				return I18N::translate('Servant');
			}
		case 'slave':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Slave');
			case 'F':
				return I18N::translate_c('FEMALE', 'Slave');
			default:
				return I18N::translate('Slave');
			}
		case 'ward':
			switch ($sex) {
			case 'M':
				return I18N::translate_c('MALE', 'Ward');
			case 'F':
				return I18N::translate_c('FEMALE', 'Ward');
			default:
				return I18N::translate('Ward');
			}
		case 'witness':
			// Do we need separate male/female translations for this?
			return I18N::translate('Witness');
		default:
			return $type;
		}
	}

	/**
	 * A list of all possible values for RELA
	 *
	 * @param GedcomRecord|null $record
	 *
	 * @return string[]
	 */
	public static function getValues(GedcomRecord $record = null) {
		$values = array();
		foreach (self::$TYPES as $type) {
			$values[$type] = self::getValue($type, $record);
		}
		uasort($values, __NAMESPACE__ . '\I18N::strcasecmp');

		return $values;
	}
}
