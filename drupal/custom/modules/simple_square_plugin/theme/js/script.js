console.log('still works');

const appId = 'sandbox-sq0idb-LQ50O2bQ13-QByK-T2eeeg';
const locationId = 'LR97C0MXRZ3TQ';

async function initializeCard(payments) {
  const card = await payments.card();
  await card.attach('#card-container');
  return card;
}

document.addEventListener('DOMContentLoaded', async function () {
  if (!window.Square) {
    throw new Error('Square.js failed to load properly');
  }

  const payments = window.Square.payments(appId, locationId);
  let card;

  try {
    card = await initializeCard(payments);
  } catch (e) {
    console.error('Initializing Card failed', e);
    return;
  }

  // Step 5.2: create card payment
});
