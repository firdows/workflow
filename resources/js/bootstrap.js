/**
 * AdminLTE
 */
import "./Layouts/AdminLTE3/plugins/jquery/jquery.min.js";
import "./Layouts/AdminLTE3/plugins/jquery-ui/jquery-ui.min.js";
import "./Layouts/AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js";
import "./Layouts/AdminLTE3/dist/js/adminlte.js";
import "./Layouts/AdminLTE3/dist/js/pages/dashboard.js";

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';