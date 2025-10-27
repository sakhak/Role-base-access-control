// import React from "react";
import {
    Card,
    Row,
    Col,
    Statistic,
    Typography,
    Divider,
    Table,
    Tag,
} from "antd";
import {
    TeamOutlined,
    BookOutlined,
    // ScheduleOutlined,
    CheckCircleOutlined,
    ClockCircleOutlined,
} from "@ant-design/icons";

const { Title } = Typography;

function AdminDashboard() {
    const stats = {
        myStudents: 245,
        myClasses: 8,
        attendanceRate: 94.2,
        pendingTasks: 5,
    };

    const recentStudents = [
        { id: "S1001", name: "John Doe", class: "Grade 5A", status: "Active" },
        {
            id: "S1002",
            name: "Jane Smith",
            class: "Grade 5A",
            status: "Active",
        },
        {
            id: "S1003",
            name: "Mike Johnson",
            class: "Grade 6B",
            status: "Active",
        },
    ];

    const columns = [
        {
            title: "ID",
            dataIndex: "id",
            key: "id",
        },
        {
            title: "Name",
            dataIndex: "name",
            key: "name",
        },
        {
            title: "Class",
            dataIndex: "class",
            key: "class",
        },
        {
            title: "Status",
            dataIndex: "status",
            key: "status",
            render: (status) => (
                <Tag color={status === "Active" ? "green" : "red"}>
                    {status}
                </Tag>
            ),
        },
    ];

    return (
        <div className="p-4">
            <Title level={3}>Admin Dashboard</Title>
            <Divider />

            <Row gutter={[16, 16]} className="mb-6">
                <Col xs={24} sm={12} md={6}>
                    <Card>
                        <Statistic
                            title="My Students"
                            value={stats.myStudents}
                            prefix={<TeamOutlined className="text-blue-500" />}
                        />
                    </Card>
                </Col>
                <Col xs={24} sm={12} md={6}>
                    <Card>
                        <Statistic
                            title="My Classes"
                            value={stats.myClasses}
                            prefix={
                                <BookOutlined className="text-purple-500" />
                            }
                        />
                    </Card>
                </Col>
                <Col xs={24} sm={12} md={6}>
                    <Card>
                        <Statistic
                            title="Attendance Rate"
                            value={stats.attendanceRate}
                            suffix="%"
                            prefix={
                                <CheckCircleOutlined className="text-green-500" />
                            }
                        />
                    </Card>
                </Col>
                <Col xs={24} sm={12} md={6}>
                    <Card>
                        <Statistic
                            title="Pending Tasks"
                            value={stats.pendingTasks}
                            prefix={
                                <ClockCircleOutlined className="text-orange-500" />
                            }
                        />
                    </Card>
                </Col>
            </Row>

            <Row gutter={[16, 16]}>
                <Col xs={24} lg={12}>
                    <Card title="Recent Students" className="h-full">
                        <Table
                            columns={columns}
                            dataSource={recentStudents}
                            pagination={false}
                            size="small"
                        />
                    </Card>
                </Col>
                <Col xs={24} lg={12}>
                    <Card title="Today's Schedule" className="h-full">
                        <div className="space-y-4">
                            {[
                                {
                                    time: "08:00 - 09:30",
                                    subject: "Mathematics",
                                    class: "Grade 5A",
                                },
                                {
                                    time: "09:30 - 11:00",
                                    subject: "Science",
                                    class: "Grade 6B",
                                },
                                {
                                    time: "11:30 - 13:00",
                                    subject: "English",
                                    class: "Grade 5A",
                                },
                            ].map((item, index) => (
                                <div
                                    key={index}
                                    className="border-b pb-3 last:border-0"
                                >
                                    <p className="font-medium">
                                        {item.subject}
                                    </p>
                                    <p className="text-gray-500">
                                        {item.time} • {item.class}
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

export default AdminDashboard;
