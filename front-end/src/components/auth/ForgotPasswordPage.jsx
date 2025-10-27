import { useState } from "react";
import { MailOutlined } from "@ant-design/icons";
import {
    Button,
    Form,
    Input,
    Card,
    Layout,
    Typography,
    Alert,
    Grid,
} from "antd";
import { Link } from "react-router-dom";
import { authService } from "../../../src/components/services/authService";

const { Title, Text } = Typography;
const { Content } = Layout;
const { useBreakpoint } = Grid;

function ForgotPasswordPage() {
    const [form] = Form.useForm();
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState("");
    const [success, setSuccess] = useState(false);
    const screens = useBreakpoint();

    const onFinish = async (values) => {
        try {
            setLoading(true);
            setError("");

            await authService.forgotPassword(values.email);

            setSuccess(true);
        } catch (err) {
            setError(err.message || "Failed to send reset email");
        } finally {
            setLoading(false);
        }
    };

    const cardStyle = {
        width: screens.xs ? "95%" : "450px",
        maxWidth: "100%",
        margin: "0 auto",
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
                <Card
                    bordered={false}
                    style={cardStyle}
                    bodyStyle={{ padding: 0 }}
                >
                    <div style={headerStyle}>
                        <Title
                            level={3}
                            style={{
                                marginBottom: "8px",
                                color: "white",
                                fontSize: screens.xs ? "20px" : "24px",
                            }}
                        >
                            Reset Password
                        </Title>
                        <Text style={{ color: "rgba(255, 255, 255, 0.8)" }}>
                            Enter your email to receive reset instructions
                        </Text>
                    </div>

                    <div style={contentStyle}>
                        {error && (
                            <Alert
                                message={error}
                                type="error"
                                showIcon
                                style={{ marginBottom: "24px" }}
                            />
                        )}
                        {success ? (
                            <div style={{ textAlign: "center" }}>
                                <Alert
                                    message="Password Reset Sent"
                                    description="We've sent an email with instructions to reset your password. Please check your inbox."
                                    type="success"
                                    showIcon
                                    style={{ marginBottom: "24px" }}
                                />
                                <Link to="/login">
                                    <Button
                                        type="primary"
                                        size={screens.xs ? "middle" : "large"}
                                    >
                                        Back to Login
                                    </Button>
                                </Link>
                            </div>
                        ) : (
                            <Form
                                form={form}
                                name="forgot_password"
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
                                            message:
                                                "Please enter a valid email!",
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

                                <Form.Item>
                                    <Button
                                        type="primary"
                                        htmlType="submit"
                                        block
                                        size={screens.xs ? "middle" : "large"}
                                        loading={loading}
                                    >
                                        Send Reset Link
                                    </Button>
                                </Form.Item>

                                <div style={{ textAlign: "center" }}>
                                    <Text>
                                        Remember your password?{" "}
                                        <Link
                                            to="/"
                                            style={{ color: "#1890ff" }}
                                        >
                                            Login here
                                        </Link>
                                    </Text>
                                </div>
                            </Form>
                        )}
                    </div>
                </Card>
            </Content>
        </Layout>
    );
}

export default ForgotPasswordPage;
