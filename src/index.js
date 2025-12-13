import { Button } from '@wordpress/components';
import { render } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import './style.css';

const App = () => (
	<div className="wordcamp-bangkok-2025">
		<p>{__('This is a simple plugin admin page from "WordCamp Bangkok 2025" plugin.', 'wordcamp-bangkok-2025')}</p>
		<Button isPrimary onClick={() => alert('Button clicked!')}>
			{__('Click here!', 'wordcamp-bangkok-2025')}
		</Button>
	</div>
);

document.addEventListener('DOMContentLoaded', () => {
	const container = document.getElementById('wordcamp-bangkok-2025-app');

	if (!container) {
		return;
	}

	render(<App />, container);
});
