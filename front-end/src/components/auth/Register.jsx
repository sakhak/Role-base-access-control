import { useState } from "react";
import {
    MailOutlined,
    LockOutlined,
    UserOutlined,
    PhoneOutlined,
} from "@ant-design/icons";
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

function Register() {
    const [form] = Form.useForm();
    const navigate = useNavigate();
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState("");
    const screens = useBreakpoint();

    const onFinish = async (values) => {
        try {
            setLoading(true);
            setError("");

            await authService.register(values);

            navigate("/login", {
                state: { success: "Registration successful! Please login." },
            });
        } catch (err) {
            setError(err.message || "Registration failed");
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
                            Create Account
                        </Title>
                        <Text style={{ color: "rgba(255, 255, 255, 0.8)" }}>
                            Join EduManage Pro School System
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

                        <Form
                            form={form}
                            name="register"
                            onFinish={onFinish}
                            layout="vertical"
                            scrollToFirstError
                        >
                            <Form.Item
                                name="name"
                                label="Full Name"
                                rules={[
                                    {
                                        required: true,
                                        message: "Please input your name!",
                                    },
                                ]}
                            >
                                <Input
                                    prefix={
                                        <UserOutlined className="text-gray-400" />
                                    }
                                    placeholder="Enter name"
                                    size={screens.xs ? "middle" : "large"}
                                />
                            </Form.Item>

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
                                name="phone"
                                label="Phone Number"
                                rules={[
                                    {
                                        required: true,
                                        message:
                                            "Please input your phone number!",
                                    },
                                ]}
                            >
                                <Input
                                    prefix={
                                        <PhoneOutlined className="text-gray-400" />
                                    }
                                    placeholder="input your phone number"
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
                                    {
                                        min: 8,
                                        message:
                                            "Password must be at least 8 characters!",
                                    },
                                ]}
                                hasFeedback
                            >
                                <Input.Password
                                    prefix={
                                        <LockOutlined className="text-gray-400" />
                                    }
                                    placeholder="Password"
                                    size={screens.xs ? "middle" : "large"}
                                />
                            </Form.Item>

                            <Form.Item
                                name="confirm"
                                label="Confirm Password"
                                dependencies={["password"]}
                                hasFeedback
                                rules={[
                                    {
                                        required: true,
                                        message:
                                            "Please confirm your password!",
                                    },
                                    ({ getFieldValue }) => ({
                                        validator(_, value) {
                                            if (
                                                !value ||
                                                getFieldValue("password") ===
                                                    value
                                            ) {
                                                return Promise.resolve();
                                            }
                                            return Promise.reject(
                                                new Error(
                                                    "Passwords do not match!"
                                                )
                                            );
                                        },
                                    }),
                                ]}
                            >
                                <Input.Password
                                    prefix={
                                        <LockOutlined className="text-gray-400" />
                                    }
                                    placeholder="Confirm Password"
                                    size={screens.xs ? "middle" : "large"}
                                />
                            </Form.Item>

                            <Form.Item
                                name="role"
                                label="Register As"
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
                                    <Option value="admin">Super Admin</Option>
                                    <Option value="client">School Admin</Option>
                                    <Option value="client">
                                        Parent/Student
                                    </Option>
                                </Select>
                            </Form.Item>

                            <Form.Item style={{ marginBottom: "16px" }}>
                                <Button
                                    type="primary"
                                    htmlType="submit"
                                    block
                                    size={screens.xs ? "middle" : "large"}
                                    loading={loading}
                                >
                                    Register
                                </Button>
                            </Form.Item>

                            <div style={{ textAlign: "center" }}>
                                <Text>
                                    Already have an account?{" "}
                                    <Link to="/" style={{ color: "#1890ff" }}>
                                        Login here
                                    </Link>
                                </Text>
                            </div>
                        </Form>
                    </div>
                </Card>
            </Content>
        </Layout>
    );
}

export default Register;
