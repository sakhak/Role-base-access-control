import { useState, useEffect } from "react";
import { Navigate, Outlet } from "react-router-dom";
import { authService } from "../../../src/components/services/authService";
import { Layout, Spin } from "antd";
import Sidebar from "../../../src/components/layout/Sidebar";
import Header from "../../../src/components/layout/Header";

const { Content } = Layout;

function ProtectedRoute({ roles, permissions }) {
    const [user, setUser] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const currentUser = authService.getCurrentUser();
        setUser(currentUser);
        setLoading(false);
    }, []);

    if (loading) {
        return <Spin size="large" className="absolute top-1/2 left-1/2" />;
    }

    if (!user) {
        return <Navigate to="/login" replace />;
    }

    if (roles && !roles.includes(user.role)) {
        return <Navigate to="/unauthorized" replace />;
    }

    if (permissions) {
        const hasPermission = permissions.some(
            (permission) =>
                user.permissions.includes("*") ||
                user.permissions.includes(permission)
        );
        if (!hasPermission) {
            return <Navigate to="/unauthorized" replace />;
        }
    }

    const getLayout = () => {
        switch (user.role) {
            case "super_admin":
            case "admin":
                return (
                    <Layout className="min-h-screen">
                        <Sidebar role={user.role} />
                        <Layout>
                            <Header user={user} />
                            <Content className="p-6 bg-gray-50">
                                <Outlet />
                            </Content>
                        </Layout>
                    </Layout>
                );
            case "client":
                return (
                    <Layout className="min-h-screen bg-gray-50">
                        <Header user={user} simple />
                        <Content className="p-6">
                            <Outlet />
                        </Content>
                    </Layout>
                );
            default:
                return <Outlet />;
        }
    };

    return getLayout();
}

export default ProtectedRoute;
