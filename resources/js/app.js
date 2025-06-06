import './bootstrap';
import AOS from "aos";
import "aos/dist/aos.css";

AOS.init({
    duration: 800,
    once: true,
});

// Make copyToClipboard available globally
window.copyToClipboard = async function(event) {
    const amount = document.getElementById('totalAmount').innerText;
    const amountToCopy = amount.replace('Rp ', '').replace(/\./g, '');
    const btn = event.currentTarget;

    try {
        // Try using modern Clipboard API
        if (navigator.clipboard && window.isSecureContext) {
            await navigator.clipboard.writeText(amountToCopy);
            showCopyFeedback(btn, true);
        } else {
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = amountToCopy;
            textArea.style.position = 'fixed';
            textArea.style.left = '-999999px';
            textArea.style.top = '-999999px';
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();

            try {
                document.execCommand('copy');
                textArea.remove();
                showCopyFeedback(btn, true);
            } catch (err) {
                console.error('Fallback: Oops, unable to copy', err);
                showCopyFeedback(btn, false);
            }
        }
    } catch (err) {
        console.error('Failed to copy text: ', err);
        showCopyFeedback(btn, false);
    }
}

function showCopyFeedback(btn, success) {
    // Remove existing tooltip if any
    const existingTooltip = btn.querySelector('.copy-tooltip');
    if (existingTooltip) existingTooltip.remove();

    // Create new tooltip
    const tooltip = document.createElement('div');
    tooltip.className = `absolute -top-8 left-1/2 -translate-x-1/2 ${success ? 'bg-green-500' : 'bg-red-500'} text-white text-xs py-1 px-2 rounded copy-tooltip`;
    tooltip.textContent = success ? 'Copied!' : 'Failed to copy';
    btn.appendChild(tooltip);

    // Update button style
    btn.className = btn.className.replace('bg-orange-500', success ? 'bg-green-500' : 'bg-red-500');

    // Remove tooltip and restore button after 1 second
    setTimeout(() => {
        tooltip.remove();
        btn.className = btn.className.replace(success ? 'bg-green-500' : 'bg-red-500', 'bg-orange-500');
    }, 1000);
}

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
