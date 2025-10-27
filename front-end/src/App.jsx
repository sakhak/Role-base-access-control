import { BrowserRouter, Routes, Route } from "react-router-dom";
import Login from "../src/pages/LoginPage/LoginPage";
import RegisterPage from "./pages/LoginPage/RegisterPage";
import ForgotPage from "./pages/LoginPage/ForgotPage";
// import DashboardPage from "./pages/dashboard/DashboardPage";
import ProtectedRoute from "./components/ProtectedRoute/ProtectedRoute";
import ClientPage from "./pages/client/ClientPage";
import AdminPage from "./pages/admin/AdminPage";
import SuperAdmin from "./components/superAdmin/SuperAdmin";
import UnauthorizedPage from "./pages/error/UnauthorizedPage";

function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route>
                    <Route path="/" element={<Login />} />
                    <Route path="/register" element={<RegisterPage />} />
                    <Route path="/forgot-password" element={<ForgotPage />} />
                </Route>
                <Route element={<ProtectedRoute roles={["super_admin"]} />}>
                    <Route path="/super-dashboard" element={<SuperAdmin />} />
                    <Route path="/admin-dashboard" element={<AdminPage />} />
                    <Route path="/client-dashboard" element={<ClientPage />} />
                    {/* <Route path="/admin/*" element={<SuperAdmin />} /> */}
                </Route>

                <Route path="/unauthorized" element={<UnauthorizedPage />} />

                {/* Default redirect */}
                {/* <Route path="/" element={<Navigate to="/login" replace />} /> */}
            </Routes>
        </BrowserRouter>
    );
}

export default App;
