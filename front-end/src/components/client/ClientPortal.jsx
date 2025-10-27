// import React from "react";
import { Card, Row, Col, Typography, Divider, List, Tag, Progress } from "antd";
import {
    UserOutlined,
    BookOutlined,
    CheckCircleOutlined,
    // ScheduleOutlined,
    FileTextOutlined,
} from "@ant-design/icons";

const { Title, Text } = Typography;

function ClientPortal() {
    const studentInfo = {
        name: "John Doe",
        grade: "Grade 5",
        class: "5A",
        attendance: 92,
        overallGrade: "A-",
    };

    const children = [
        { name: "John Doe", grade: "Grade 5" },
        { name: "Jane Doe", grade: "Grade 3" },
    ];

    const upcomingExams = [
        { subject: "Mathematics", date: "May 15, 2023", type: "Midterm" },
        { subject: "Science", date: "May 20, 2023", type: "Quiz" },
    ];

    return (
        <div className="p-4">
            <Title level={3}>Parent/Student Portal</Title>
            <Text type="secondary">Welcome back, {studentInfo.name}</Text>
            <Divider />

            <Row gutter={[16, 16]} className="mb-6">
                <Col xs={24} sm={12} md={8}>
                    <Card>
                        <div className="text-center">
                            <UserOutlined className="text-3xl mb-3 text-blue-500" />
                            <Title level={4} className="mb-1">
                                {studentInfo.name}
                            </Title>
                            <Text>
                                {studentInfo.grade} - {studentInfo.class}
                            </Text>
                        </div>
                    </Card>
                </Col>
                <Col xs={24} sm={12} md={8}>
                    <Card>
                        <div className="text-center">
                            <CheckCircleOutlined className="text-3xl mb-3 text-green-500" />
                            <Title level={4} className="mb-1">
                                Attendance
                            </Title>
                            <Progress
                                percent={studentInfo.attendance}
                                status="active"
                                className="mb-2"
                            />
                            <Text>
                                {studentInfo.attendance}% attendance rate
                            </Text>
                        </div>
                    </Card>
                </Col>
                <Col xs={24} sm={12} md={8}>
                    <Card>
                        <div className="text-center">
                            <FileTextOutlined className="text-3xl mb-3 text-purple-500" />
                            <Title level={4} className="mb-1">
                                Overall Grade
                            </Title>
                            <Text className="text-2xl font-bold">
                                {studentInfo.overallGrade}
                            </Text>
                        </div>
                    </Card>
                </Col>
            </Row>

            <Row gutter={[16, 16]}>
                <Col xs={24} lg={12}>
                    <Card title="My Children">
                        <List
                            dataSource={children}
                            renderItem={(child) => (
                                <List.Item>
                                    <List.Item.Meta
                                        avatar={
                                            <UserOutlined className="text-blue-500" />
                                        }
                                        title={child.name}
                                        description={child.grade}
                                    />
                                </List.Item>
                            )}
                        />
                    </Card>
                </Col>
                <Col xs={24} lg={12}>
                    <Card title="Upcoming Exams">
                        <List
                            dataSource={upcomingExams}
                            renderItem={(exam) => (
                                <List.Item>
                                    <List.Item.Meta
                                        avatar={
                                            <BookOutlined className="text-green-500" />
                                        }
                                        title={exam.subject}
                                        description={
                                            <div>
                                                <div>{exam.date}</div>
                                                <Tag color="blue">
                                                    {exam.type}
                                                </Tag>
                                            </div>
                                        }
                                    />
                                </List.Item>
                            )}
                        />
                    </Card>
                </Col>
            </Row>
        </div>
    );
}

export default ClientPortal;
