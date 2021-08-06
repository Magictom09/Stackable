/*
 * External dependencies
 */
import {
	InspectorStyleControls,
	PanelAdvancedSettings,
	AdvancedSelectControl,
} from '~stackable/components'
import { i18n } from 'stackable'
import {
	useAttributeEditHandlers,
} from '~stackable/hooks'

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n'

/**
 * Internal dependencies
 */
import { useAvailableContext } from './hooks'

export const Edit = props => {
	const {
		context,
	} = props

	const {
		getAttribute,
		updateAttributes,
	} = useAttributeEditHandlers()

	const availableContext = useAvailableContext( context )

	if ( ! Object.keys( context ).length ) {
		return null
	}

	return (
		<>
			<InspectorStyleControls>
				<PanelAdvancedSettings
					title={ __( 'Dynamic Context', i18n ) }
					id="context"
					checked={ getAttribute( 'usesContext' ) }
					onChange={ value => {
						updateAttributes( {
							usesContext: value,
							...( ! value ? { text: '' } : {} ),
						} )
					} }
				>
					<AdvancedSelectControl
						label={ __( 'Context Type' ) }
						attribute="contextType"
						options={ availableContext }
					/>
				</PanelAdvancedSettings>
			</InspectorStyleControls>
		</>
	)
}
