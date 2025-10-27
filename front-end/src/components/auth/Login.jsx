import { React, useState } from "react";
import { LockOutlined, MailOutlined } from "@ant-design/icons";
import {
    Button,
    Form,
    Input,
    Card,
    Layout,
    Typography,
    Alert,
    Select,
    Grid,
} from "antd";
import { Link, useNavigate } from "react-router-dom";
import { authService } from "../../../src/components/services/authService";

const { Title, Text } = Typography;
const { Content } = Layout;
const { Option } = Select;
const { useBreakpoint } = Grid;

function Login() {
    const [form] = Form.useForm();
    const navigate = useNavigate();
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState("");
    const screens = useBreakpoint();

    const onFinish = async (values) => {
        try {
            setLoading(true);
            setError("");
            const { email, password, role } = values;

            const user = await authService.login(email, password, role);

            switch (user.role) {
                case "super_admin":
                    navigate("/super-dashboard");
                    break;
                case "admin":
                    navigate("/admin-dashboard");
                    break;
                case "client":
                    navigate("/client-dashboard");
                    break;
                default:
                    navigate("/");
            }
        } catch (err) {
            setError(err.message || "Login failed");
        } finally {
            setLoading(false);
        }
    };

    const cardStyle = {
        width: screens.xs ? "100%" : "400px",
        maxWidth: "100%",
        boxShadow: "0 4px 12px rgba(0, 0, 0, 0.1)",
        borderRadius: "8px",
        overflow: "hidden",
    };

    const headerStyle = {
        padding: screens.xs ? "16px" : "24px",
        background: "#1890ff",
        color: "white",
        textAlign: "center",
    };

    const contentStyle = {
        padding: screens.xs ? "16px" : "24px",
    };

    return (
        <Layout
            style={{
                minHeight: "100vh",
                background: "linear-gradient(to right, #f0f9ff, #e6f7ff)",
            }}
        >
            <Content
                style={{
                    display: "flex",
                    alignItems: "center",
                    justifyContent: "center",
                    padding: screens.xs ? "16px" : "24px",
                }}
            >
                <Card style={cardStyle} bordered={false}>
                    <div style={headerStyle}>
                        <Title
                            level={3}
                            style={{
                                marginBottom: "8px",
                                color: "white",
                                fontSize: screens.xs ? "20px" : "24px",
                            }}
                        >
                            EduManage Pro
                        </Title>
                        <Text style={{ color: "rgba(255, 255, 255, 0.8)" }}>
                            School Management System
                        </Text>
                    </div>

                    <div style={contentStyle}>
                        {error && (
                            <Alert
                                message={error}
                                type="error"
                                showIcon
                                className="mb-4"
                            />
                        )}

                        <Form
                            form={form}
                            name="login"
                            onFinish={onFinish}
                            layout="vertical"
                        >
                            <Form.Item
                                name="email"
                                label="Email"
                                rules={[
                                    {
                                        required: true,
                                        message: "Please input your email!",
                                    },
                                    {
                                        type: "email",
                                        message: "Please enter a valid email!",
                                    },
                                ]}
                            >
                                <Input
                                    prefix={
                                        <MailOutlined className="text-gray-400" />
                                    }
                                    placeholder="your@email.com"
                                    size={screens.xs ? "middle" : "large"}
                                />
                            </Form.Item>

                            <Form.Item
                                name="password"
                                label="Password"
                                rules={[
                                    {
                                        required: true,
                                        message: "Please input your password!",
                                    },
                                ]}
                            >
                                <Input.Password
                                    prefix={
                                        <LockOutlined className="text-gray-400" />
                                    }
                                    type="password"
                                    placeholder="Password"
                                    size={screens.xs ? "middle" : "large"}
                                />
                            </Form.Item>

                            <Form.Item
                                name="role"
                                label="Login As"
                                rules={[
                                    {
                                        required: true,
                                        message: "Please select your role!",
                                    },
                                ]}
                            >
                                <Select
                                    size={screens.xs ? "middle" : "large"}
                                    placeholder="Select your role"
                                >
                                    <Option value="super_admin">
                                        Super Admin
                                    </Option>
                                    <Option value="admin">School Admin</Option>
                                    <Option value="client">
                                        Parent/Student
                                    </Option>
                                </Select>
                            </Form.Item>

                            <Form.Item>
                                <Button
                                    type="primary"
                                    htmlType="submit"
                                    block
                                    size={screens.xs ? "middle" : "large"}
                                    loading={loading}
                                >
                                    Log in
                                </Button>
                            </Form.Item>

                            <div
                                style={{
                                    display: "flex",
                                    justifyContent: "space-between",
                                    flexDirection: screens.xs
                                        ? "column"
                                        : "row",
                                    gap: screens.xs ? "8px" : "0",
                                }}
                            >
                                <Link
                                    to="/forgot-password"
                                    style={{ color: "#1890ff" }}
                                >
                                    Forgot password?
                                </Link>
                                <Link
                                    to="/register"
                                    style={{ color: "#1890ff" }}
                                >
                                    Create new account
                                </Link>
                            </div>
                        </Form>
                    </div>
                </Card>
            </Content>
        </Layout>
    );
}

export default Login;
