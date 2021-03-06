USE [master]
GO
/****** Object:  Database [Project]    Script Date: 8/25/2021 8:02:55 AM ******/
CREATE DATABASE [Project]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'Project', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\Project.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'Project_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\Project_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [Project] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [Project].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [Project] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [Project] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [Project] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [Project] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [Project] SET ARITHABORT OFF 
GO
ALTER DATABASE [Project] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [Project] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [Project] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [Project] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [Project] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [Project] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [Project] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [Project] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [Project] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [Project] SET  DISABLE_BROKER 
GO
ALTER DATABASE [Project] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [Project] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [Project] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [Project] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [Project] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [Project] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [Project] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [Project] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [Project] SET  MULTI_USER 
GO
ALTER DATABASE [Project] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [Project] SET DB_CHAINING OFF 
GO
ALTER DATABASE [Project] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [Project] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [Project] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [Project] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [Project] SET QUERY_STORE = OFF
GO
USE [Project]
GO
/****** Object:  Table [dbo].[TableProductMember]    Script Date: 8/25/2021 8:02:55 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TableProductMember](
	[MPID] [int] NOT NULL,
	[MemberID] [varchar](20) NOT NULL,
	[ProductID] [varchar](20) NOT NULL,
	[Cost] [int] NULL,
	[DateTime] [datetime] NULL,
 CONSTRAINT [PK_TableProductMember] PRIMARY KEY CLUSTERED 
(
	[MPID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TableRequest]    Script Date: 8/25/2021 8:02:55 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TableRequest](
	[ConsulationNumber] [int] IDENTITY(100,1) NOT NULL,
	[MemberID] [varchar](20) NULL,
	[VetID] [varchar](20) NULL,
	[Time] [varchar](20) NULL,
	[Status] [varchar](20) NULL,
 CONSTRAINT [PK_TableRequest] PRIMARY KEY CLUSTERED 
(
	[ConsulationNumber] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TableUserLogin]    Script Date: 8/25/2021 8:02:55 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TableUserLogin](
	[UserID] [varchar](20) NOT NULL,
	[Password] [varchar](20) NOT NULL,
	[Role] [varchar](20) NOT NULL,
 CONSTRAINT [PK_TableUserLogin] PRIMARY KEY CLUSTERED 
(
	[UserID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TAppointmentList]    Script Date: 8/25/2021 8:02:55 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TAppointmentList](
	[MemberID] [varchar](20) NOT NULL,
	[VetID] [varchar](20) NOT NULL,
	[Time] [date] NOT NULL,
	[AppointmentNumber] [int] IDENTITY(1,1) NOT NULL,
	[Status] [varchar](20) NULL,
 CONSTRAINT [PK_TAppointmentList] PRIMARY KEY CLUSTERED 
(
	[AppointmentNumber] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TMember]    Script Date: 8/25/2021 8:02:55 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TMember](
	[MemberID] [varchar](20) NOT NULL,
	[MemberName] [varchar](20) NULL,
	[MemberEmail] [varchar](50) NULL,
 CONSTRAINT [PK_TMember] PRIMARY KEY CLUSTERED 
(
	[MemberID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TMemberVet]    Script Date: 8/25/2021 8:02:55 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TMemberVet](
	[MVID] [int] NOT NULL,
	[MemberID] [varchar](20) NOT NULL,
	[VetID] [varchar](20) NOT NULL,
	[ConsultationDate] [date] NULL,
	[ConsultationStatus] [varchar](10) NULL,
 CONSTRAINT [PK_TMemberVet] PRIMARY KEY CLUSTERED 
(
	[MVID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TOrderList]    Script Date: 8/25/2021 8:02:55 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TOrderList](
	[MemberID] [varchar](20) NOT NULL,
	[ProductID] [varchar](20) NOT NULL,
	[Cost] [int] NOT NULL,
	[OrderNumber] [int] IDENTITY(1,1) NOT NULL,
 CONSTRAINT [PK_TOrderList] PRIMARY KEY CLUSTERED 
(
	[OrderNumber] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TProduct]    Script Date: 8/25/2021 8:02:55 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TProduct](
	[ProductID] [varchar](20) NOT NULL,
	[ProductName] [varchar](20) NULL,
	[ProductPrice] [int] NULL,
	[ProductQuantity] [int] NULL,
 CONSTRAINT [PK_TProduct] PRIMARY KEY CLUSTERED 
(
	[ProductID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TRequest]    Script Date: 8/25/2021 8:02:55 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TRequest](
	[AppointmentNumber] [int] IDENTITY(100,1) NOT NULL,
	[MemberID] [varchar](20) NOT NULL,
	[VetID] [varchar](20) NOT NULL,
	[Time] [date] NULL,
	[Status] [varchar](20) NULL,
 CONSTRAINT [PK_TRequest_1] PRIMARY KEY CLUSTERED 
(
	[AppointmentNumber] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TVet]    Script Date: 8/25/2021 8:02:55 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TVet](
	[VetID] [varchar](20) NOT NULL,
	[VetName] [varchar](20) NULL,
	[VetEmail] [varchar](50) NULL,
	[Time] [varchar](20) NULL,
 CONSTRAINT [PK_TVet] PRIMARY KEY CLUSTERED 
(
	[VetID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[TableRequest] ON 

INSERT [dbo].[TableRequest] ([ConsulationNumber], [MemberID], [VetID], [Time], [Status]) VALUES (100, N'm-01', N'v-01', N'8/22/2021', N'Accepted')
INSERT [dbo].[TableRequest] ([ConsulationNumber], [MemberID], [VetID], [Time], [Status]) VALUES (101, N'm-01', N'v-02', N'8/22/2021', N'Accepted')
INSERT [dbo].[TableRequest] ([ConsulationNumber], [MemberID], [VetID], [Time], [Status]) VALUES (102, N'm-01', N'v-03', N'8/22/2021', N'Accepted')
INSERT [dbo].[TableRequest] ([ConsulationNumber], [MemberID], [VetID], [Time], [Status]) VALUES (103, N'm-01', N'v-01', N'8/22/2021', N'Rejected')
INSERT [dbo].[TableRequest] ([ConsulationNumber], [MemberID], [VetID], [Time], [Status]) VALUES (104, N'm-01', N'v-01', N'8/22/2021', N'Rejected')
INSERT [dbo].[TableRequest] ([ConsulationNumber], [MemberID], [VetID], [Time], [Status]) VALUES (105, N'm-01', N'v-02', N'8/22/2021', N'Pending')
INSERT [dbo].[TableRequest] ([ConsulationNumber], [MemberID], [VetID], [Time], [Status]) VALUES (106, N'm-01', N'v-01', N'8/22/2021', N'Accepted')
INSERT [dbo].[TableRequest] ([ConsulationNumber], [MemberID], [VetID], [Time], [Status]) VALUES (107, N'm-01', N'v-02', N'8/21/2021', N'Pending')
INSERT [dbo].[TableRequest] ([ConsulationNumber], [MemberID], [VetID], [Time], [Status]) VALUES (108, N'm-03', N'v-01', N'8/22/2021', N'Accepted')
INSERT [dbo].[TableRequest] ([ConsulationNumber], [MemberID], [VetID], [Time], [Status]) VALUES (109, N'm-03', N'v-02', N'8/24/2021', N'Accepted')
INSERT [dbo].[TableRequest] ([ConsulationNumber], [MemberID], [VetID], [Time], [Status]) VALUES (110, N'm-01', N'v-02', N'8/24/2021', N'Pending')
SET IDENTITY_INSERT [dbo].[TableRequest] OFF
GO
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N'admin', N'123', N'admin')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N'm-01', N'123', N'member')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N'm-02', N'456', N'member')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N'm-03', N'789', N'member')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N'm-08', N'asd', N'member')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N'm-09', N'123', N'member')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N'm-10', N'asd', N'member')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N'm-11', N'ABCD', N'member')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N's-01', N'123', N'shop')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N's-02', N'456', N'shop')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N's-03', N'789', N'shop')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N'v-01', N'123', N'vet')
INSERT [dbo].[TableUserLogin] ([UserID], [Password], [Role]) VALUES (N'v-02', N'456', N'vet')
GO
SET IDENTITY_INSERT [dbo].[TAppointmentList] ON 

INSERT [dbo].[TAppointmentList] ([MemberID], [VetID], [Time], [AppointmentNumber], [Status]) VALUES (N'm-01', N'v-04', CAST(N'2011-08-22' AS Date), 1, N'Accepted')
INSERT [dbo].[TAppointmentList] ([MemberID], [VetID], [Time], [AppointmentNumber], [Status]) VALUES (N'm-02', N'v-03', CAST(N'2020-08-05' AS Date), 5, N'Accepted')
INSERT [dbo].[TAppointmentList] ([MemberID], [VetID], [Time], [AppointmentNumber], [Status]) VALUES (N'm-01', N'v-02', CAST(N'2021-08-22' AS Date), 9, N'Accepted')
INSERT [dbo].[TAppointmentList] ([MemberID], [VetID], [Time], [AppointmentNumber], [Status]) VALUES (N'm-01', N'v-01', CAST(N'2000-08-01' AS Date), 10, N'Accepted')
INSERT [dbo].[TAppointmentList] ([MemberID], [VetID], [Time], [AppointmentNumber], [Status]) VALUES (N'm-01', N'v-01', CAST(N'2021-08-22' AS Date), 11, N'Accepted')
INSERT [dbo].[TAppointmentList] ([MemberID], [VetID], [Time], [AppointmentNumber], [Status]) VALUES (N'm-01', N'v-01', CAST(N'2021-08-22' AS Date), 12, N'Pending')
INSERT [dbo].[TAppointmentList] ([MemberID], [VetID], [Time], [AppointmentNumber], [Status]) VALUES (N'm-01', N'v-02', CAST(N'2021-08-22' AS Date), 13, N'Pending')
SET IDENTITY_INSERT [dbo].[TAppointmentList] OFF
GO
INSERT [dbo].[TMember] ([MemberID], [MemberName], [MemberEmail]) VALUES (N'm-01', N'anik', N'a01@gmail.com')
INSERT [dbo].[TMember] ([MemberID], [MemberName], [MemberEmail]) VALUES (N'm-02', N'kumar', N'k02@gmail.com')
INSERT [dbo].[TMember] ([MemberID], [MemberName], [MemberEmail]) VALUES (N'm-03', N'saha', N's03@gmail.com')
INSERT [dbo].[TMember] ([MemberID], [MemberName], [MemberEmail]) VALUES (N'm-04', N'Nafiz', N'd@gmail.com')
GO
INSERT [dbo].[TMemberVet] ([MVID], [MemberID], [VetID], [ConsultationDate], [ConsultationStatus]) VALUES (1, N'm-02', N'v-01', CAST(N'2021-08-21' AS Date), N'pending')
INSERT [dbo].[TMemberVet] ([MVID], [MemberID], [VetID], [ConsultationDate], [ConsultationStatus]) VALUES (2, N'm-01', N'v-02', CAST(N'2021-05-21' AS Date), N'accepted')
GO
SET IDENTITY_INSERT [dbo].[TOrderList] ON 

INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-09', N'p-09', 12, 3)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 120, 4)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-02', N'p-03', 240, 5)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 120, 6)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-04', 12, 7)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 240, 8)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 120, 9)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 4200, 10)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 4200, 11)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 14760, 12)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', -120, 13)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 240, 14)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', -240, 15)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 0, 16)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 600, 17)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 120, 18)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-02', N'p-03', 120, 19)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-03', 120, 20)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-06', 120, 21)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-09', 120, 22)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-08', 180, 23)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-02', N'p-08', 60, 24)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-02', N'p-09', 120, 25)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-03', N'p-09', 60, 26)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-03', N'p-08', 60, 27)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-03', N'p-06', 180, 28)
INSERT [dbo].[TOrderList] ([MemberID], [ProductID], [Cost], [OrderNumber]) VALUES (N'm-01', N'p-08', 120, 29)
SET IDENTITY_INSERT [dbo].[TOrderList] OFF
GO
INSERT [dbo].[TProduct] ([ProductID], [ProductName], [ProductPrice], [ProductQuantity]) VALUES (N'p-08', N'Cats Food', 60, 98)
INSERT [dbo].[TProduct] ([ProductID], [ProductName], [ProductPrice], [ProductQuantity]) VALUES (N'p-09', N'Birds Food', 60, 60)
INSERT [dbo].[TProduct] ([ProductID], [ProductName], [ProductPrice], [ProductQuantity]) VALUES (N'p-10', N'Medicine', 3, 30)
INSERT [dbo].[TProduct] ([ProductID], [ProductName], [ProductPrice], [ProductQuantity]) VALUES (N'p-11', N'Toys', 123, 123)
INSERT [dbo].[TProduct] ([ProductID], [ProductName], [ProductPrice], [ProductQuantity]) VALUES (N'p-12', N'Milk', 400, 50)
INSERT [dbo].[TProduct] ([ProductID], [ProductName], [ProductPrice], [ProductQuantity]) VALUES (N'p-13', N'cat toy', 70, 49)
INSERT [dbo].[TProduct] ([ProductID], [ProductName], [ProductPrice], [ProductQuantity]) VALUES (N'p-14', N'dog toy', 39, 190)
INSERT [dbo].[TProduct] ([ProductID], [ProductName], [ProductPrice], [ProductQuantity]) VALUES (N'p-15', N'bird food', 23, 23)
INSERT [dbo].[TProduct] ([ProductID], [ProductName], [ProductPrice], [ProductQuantity]) VALUES (N'p-16', N'Rabbit Food', 80, 50)
INSERT [dbo].[TProduct] ([ProductID], [ProductName], [ProductPrice], [ProductQuantity]) VALUES (N'p-17', N'ggg', 40, 32)
GO
SET IDENTITY_INSERT [dbo].[TRequest] ON 

INSERT [dbo].[TRequest] ([AppointmentNumber], [MemberID], [VetID], [Time], [Status]) VALUES (1, N'm-01', N'v-01', CAST(N'2021-08-22' AS Date), N'Pending')
INSERT [dbo].[TRequest] ([AppointmentNumber], [MemberID], [VetID], [Time], [Status]) VALUES (2, N'm-01', N'v-02', CAST(N'2021-08-22' AS Date), N'Pending')
INSERT [dbo].[TRequest] ([AppointmentNumber], [MemberID], [VetID], [Time], [Status]) VALUES (3, N'e-01', N'v-01', CAST(N'2000-08-09' AS Date), N'Pending')
SET IDENTITY_INSERT [dbo].[TRequest] OFF
GO
INSERT [dbo].[TVet] ([VetID], [VetName], [VetEmail], [Time]) VALUES (N'v-01', N'nafiz', N'n01@gmail.com', N'8/22/2021')
INSERT [dbo].[TVet] ([VetID], [VetName], [VetEmail], [Time]) VALUES (N'v-02', N'ahmed', N'a02@gmail.com', N'8/24/2021')
INSERT [dbo].[TVet] ([VetID], [VetName], [VetEmail], [Time]) VALUES (N'v-03', N'anik', N'a@gmail.com', N'8/20/2021')
GO
ALTER TABLE [dbo].[TableProductMember]  WITH CHECK ADD  CONSTRAINT [FK_TableProductMember_TMember] FOREIGN KEY([MemberID])
REFERENCES [dbo].[TMember] ([MemberID])
GO
ALTER TABLE [dbo].[TableProductMember] CHECK CONSTRAINT [FK_TableProductMember_TMember]
GO
ALTER TABLE [dbo].[TableProductMember]  WITH CHECK ADD  CONSTRAINT [FK_TableProductMember_TProduct] FOREIGN KEY([ProductID])
REFERENCES [dbo].[TProduct] ([ProductID])
GO
ALTER TABLE [dbo].[TableProductMember] CHECK CONSTRAINT [FK_TableProductMember_TProduct]
GO
ALTER TABLE [dbo].[TMemberVet]  WITH CHECK ADD  CONSTRAINT [FK_TMemberVet_TMember] FOREIGN KEY([MemberID])
REFERENCES [dbo].[TMember] ([MemberID])
GO
ALTER TABLE [dbo].[TMemberVet] CHECK CONSTRAINT [FK_TMemberVet_TMember]
GO
ALTER TABLE [dbo].[TMemberVet]  WITH CHECK ADD  CONSTRAINT [FK_TMemberVet_TVet] FOREIGN KEY([VetID])
REFERENCES [dbo].[TVet] ([VetID])
GO
ALTER TABLE [dbo].[TMemberVet] CHECK CONSTRAINT [FK_TMemberVet_TVet]
GO
USE [master]
GO
ALTER DATABASE [Project] SET  READ_WRITE 
GO
