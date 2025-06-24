const express = require('express');
const app = express();

app.get('/', (req, res) => {
  res.send('<h1>App vulnerable ejecutándose 👀</h1>');
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`🚀 App corriendo en http://localhost:${PORT}`);
});
