import { registerBlockType } from '@wordpress/blocks';
//puoi importare un css tramite import {generaCSS} from 'path/to/css/file.css';//
import { InnerBlocks, InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';
import blockMeta from '../block.json';



registerBlockType (blockMeta.name, {
    title:blockMeta.title,
    description: blockMeta.description,
    category: blockMeta.category,
    icon: blockMeta.icon,
    attributes: {
        "columns": {
            "type": "number",
            "default": 3
        }
    },
    edit: (props) => {
        const blockProps = useBlockProps({
            style: { '--cer-grid-columns': props.attributes.columns }
        });; //aggiungi le proprietà del blocco se necessarie
        return <>
            <InspectorControls key="settings">  
                <PanelBody title="Grid Settings">
                    <RangeControl
                        label="Numero di colonne"
                        value={props.attributes.columns}
                        onChange={
                            (newColumns) => {props.setAttributes({ columns: newColumns })}
                        }
                        min={1}
                        max={12}
                        rangeStep={1}
                        withInputField={false}
                    />

                </PanelBody>
            </InspectorControls>

         <div {...blockProps}>
            <InnerBlocks />

        </div>
        </>;
    },
    save: (props) => {
        const blockProps = useBlockProps.save({
            style: { '--cer-grid-columns': props.attributes.columns }
        });; //aggiungi le proprietà del blocco se necessarie
        return<div {...blockProps} >
            <InnerBlocks.Content />

        </div>;
    }
});
  