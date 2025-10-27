// import React from "react";
import { Result, Button, Typography } from "antd";
import { LockOutlined } from "@ant-design/icons";
import { Link } from "react-router-dom";

const { Title } = Typography;

function UnauthorizedPage() {
    return (
        <div className="flex items-center justify-center min-h-screen p-4">
            <Result
                icon={<LockOutlined className="text-5xl text-red-500" />}
                title={<Title level={3}>403 - Unauthorized Access</Title>}
                subTitle="Sorry, you are not authorized to access this page."
                extra={
                    <Link to="/login">
                        <Button type="primary">Back to Home</Button>
                    </Link>
                }
            />
        </div>
    );
}

export default UnauthorizedPage;
