// import React from "react";
import { Card, Row, Col, Statistic, Typography, Space, Divider } from "antd";
import {
    UserOutlined,
    TeamOutlined,
    BookOutlined,
    DollarOutlined,
    ScheduleOutlined,
    PieChartOutlined,
} from "@ant-design/icons";

const { Title } = Typography;

function SuperAdmin() {
    const stats = {
        totalStudents: 1254,
        totalTeachers: 68,
        totalClasses: 32,
        revenue: 88450,
        attendanceRate: 92.5,
        pendingRequests: 18,
    };

    return (
        <div className="p-4">
            <Title level={3}>Super Admin Dashboard</Title>
            <Divider />

            <Row gutter={[16, 16]} className="mb-6">
                <Col xs={24} sm={12} md={8} lg={6}>
                    <Card>
                        <Statistic
                            title="Total Students"
                            value={stats.totalStudents}
                            prefix={<TeamOutlined className="text-blue-500" />}
                            valueStyle={{ color: "#3f8600" }}
                        />
                    </Card>
                </Col>
                <Col xs={24} sm={12} md={8} lg={6}>
                    <Card>
                        <Statistic
                            title="Total Teachers"
                            value={stats.totalTeachers}
                            prefix={
                                <UserOutlined className="text-purple-500" />
                            }
                            valueStyle={{ color: "#3f8600" }}
                        />
                    </Card>
                </Col>
                <Col xs={24} sm={12} md={8} lg={6}>
                    <Card>
                        <Statistic
                            title="Total Classes"
                            value={stats.totalClasses}
                            prefix={
                                <BookOutlined className="text-orange-500" />
                            }
                            valueStyle={{ color: "#3f8600" }}
                        />
                    </Card>
                </Col>
                <Col xs={24} sm={12} md={8} lg={6}>
                    <Card>
                        <Statistic
                            title="Revenue"
                            value={stats.revenue}
                            prefix={
                                <DollarOutlined className="text-green-500" />
                            }
                            valueStyle={{ color: "#3f8600" }}
                            //   prefix ="$"
                        />
                    </Card>
                </Col>
            </Row>

            <Row gutter={[16, 16]}>
                <Col xs={24} lg={12}>
                    <Card title="Quick Actions" className="h-full">
                        <Space direction="vertical" className="w-full">
                            <div className="grid grid-cols-2 gap-4">
                                <Card hoverable className="text-center">
                                    <ScheduleOutlined className="text-2xl mb-2 text-blue-500" />
                                    <p>Manage Attendance</p>
                                </Card>
                                <Card hoverable className="text-center">
                                    <BookOutlined className="text-2xl mb-2 text-purple-500" />
                                    <p>Create Exam</p>
                                </Card>
                                <Card hoverable className="text-center">
                                    <UserOutlined className="text-2xl mb-2 text-green-500" />
                                    <p>Add New User</p>
                                </Card>
                                <Card hoverable className="text-center">
                                    <PieChartOutlined className="text-2xl mb-2 text-orange-500" />
                                    <p>View Reports</p>
                                </Card>
                            </div>
                        </Space>
                    </Card>
                </Col>
                <Col xs={24} lg={12}>
                    <Card title="Recent Activity" className="h-full">
                        <div className="space-y-4">
                            {[1, 2, 3, 4].map((item) => (
                                <div
                                    key={item}
                                    className="border-b pb-3 last:border-0"
                                >
                                    <p className="font-medium">
                                        System update completed
                                    </p>
                                    <p className="text-gray-500 text-sm">
                                        2 hours ago
                                    </p>
                                </div>
                            ))}
                        </div>
                    </Card>
                </Col>
            </Row>
        </div>
    );
}

export default SuperAdmin;
