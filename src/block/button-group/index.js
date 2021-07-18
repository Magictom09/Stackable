/**
 * BLOCK: Button Block
 */
/**
 * External dependencies
 */
import { ButtonIcon } from '~stackable/icons'

/**
 * Internal dependencies
 */
import edit from './edit'
import save from './save'
import schema from './schema'
import metadata from './block.json'

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n'

export const name = 'stackable/button-group'

export const settings = {
	...metadata,
	icon: ButtonIcon,
	attributes: schema,
	supports: {
		anchor: true,
		align: true,
	},

	edit,
	save,
}

