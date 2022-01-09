/*
********** Done by **********
Anik Kumar Saha (19-41289-3)
Nafiz Ahmed (19-41283-3)
Ayesha Akhtar (19-41292-3)
Tonmoy Saha Choyon (19-41293-3)



********** Keyboard interactions **********
Press “d” for Day view
Press “n” for Night view
Press “w” for Winter view
Press “m” for Monsoon view
*/



#include <windows.h>
#include <GL/glut.h>
#include<math.h>>
#include<cstdio>
#include <GL/gl.h>
# define PI           3.14159265358979323846
#include <cctype>



//
void DayView();
void NightView();
void WinterView();

void DayRiver();
void NightRiver();

void DaySky();
void NightSky();
void WinterSky();

void CircleForCloud(GLfloat a, GLfloat b, GLfloat r);
void Cloud1();
void Cloud2();

void Bridge();

void Clock();
void Idle();
void OuterCircleForClock(GLfloat a, GLfloat b, GLfloat r);
void InnerCircleForClock(GLfloat a, GLfloat b, GLfloat r);
GLfloat ClockHour = 0.0f;
GLfloat ClockMinute = 0.0f;
GLfloat ClockSecond = 0.0f;

void CloudAnimation1(int value);
void CloudAnimation2(int value);
GLfloat CloudPosition1 = 0.0f;
GLfloat CloudSpeed1 = 0.01f;
GLfloat CloudPosition2 = 0.0f;
GLfloat CloudSpeed2 = 0.01f;

void Sun();
void Moon();

void handleKeypress(unsigned char key, int x, int y);
//



//
void window1();
void window2();
void apart1();
void buildingside();
void cross();
void leftBuildingOfapart2();
void apart2();
void apart3();
void Circle(GLfloat a, GLfloat b, GLfloat r,int R,int G,int B);
void apart4();
void apart5();
void apart6();
void apart7();
void apart8();
void apart9();
void apart10();
void Buildings();

void SoundOff();
void ShipSound();
void CarSound();
void CarShipSound();

bool isNight = false;

GLfloat snowPos = 0.0f;
GLfloat snowSpd = 0.05f;
void CircleSnow(GLfloat a, GLfloat b, GLdouble r,int R,int G,int B);
void snowFall();
void snowAnimation(int value);
//



//
GLfloat position_car1 = 0.0f, speed_car1 = 0.1f, rotation_car1 = 0.0f;
void animation_car1(int value);
void display_car1();

GLfloat position_car2 = 0.0f, speed_car2 = 0.1f, rotation_car2 = 0.0f;
void animation_car2(int value);
void display_car2();

GLfloat position_car3 = 0.0f, speed_car3 = 0.1f, rotation_car3 = 0.0f;
void animation_car3(int value);
void display_car3();

GLfloat position_car4 = 0.0f, speed_car4 = 0.1f, rotation_car4 = 0.0f;
void animation_car4(int value);
void display_car4();

GLfloat position_car5 = 0.0f, speed_car5 = 0.1f, rotation_car5 = 0.0f;
void animation_car5(int value);
void display_car5();

void star();

void Thunder1();
void Thunder2();

void Rain(GLfloat a, GLfloat y);
void RainFall();
void RainAnimation(int value);
GLfloat RainPos = 10.0f;

void MonsoonRiver();
void MonsoonView();
void MonsoonSky();
//



//
void WinterRiver();

GLfloat position_ship1 = 0.0f, speed_ship1 = 0.1f ;
void animation_ship1(int value);
void Smoke(GLfloat a, GLfloat b, GLfloat r);
void ship();

GLfloat position_ship2 = 0.0f, speed_ship2 = 0.1f ;
void animation_ship2(int value);
void ship2();

GLfloat position_waves = 0.0f, speed_waves = 0.1f ;
void animation_waves(int value);
void waves();

void StormCloud(GLfloat a, GLfloat b, GLfloat r);
void RainCloud();

void RainThunderSound();
//



int main(int argc, char** argv)
{
    glutInit(&argc, argv);
    glutCreateWindow("Washington D.C.");
    glutInitWindowSize(320, 320);

    glutDisplayFunc(WinterView);
    glutIdleFunc(Idle);
    glutTimerFunc(40, CloudAnimation1, 0);
    glutTimerFunc(40, CloudAnimation2, 0);
    glutKeyboardFunc(handleKeypress);


    glutTimerFunc(10, animation_car1,0);
    glutTimerFunc(10, animation_car2,0);
    glutTimerFunc(10, animation_car3,0);
    glutTimerFunc(10, animation_car4,0);
    glutTimerFunc(10, animation_car5,0);
    glutTimerFunc(100, RainAnimation, 0);


    glutTimerFunc(200,animation_ship1,0);
    glutTimerFunc(100,animation_ship2,0);
    glutTimerFunc(300, animation_waves, 0);


    glutTimerFunc(100, snowAnimation, 0);

    glutMainLoop();

    return 0;
}



void DayView()
{
    glClearColor(0.0f, 0.0f, 0.0f, 1.0f);
    glClear(GL_COLOR_BUFFER_BIT);



    DayRiver();

    DaySky();

    Sun();

    glPushMatrix();
    glTranslatef(CloudPosition1,0,0);
    Cloud1();
    Cloud2();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(CloudPosition2,0,0);
    //Copy of cloud1
    glTranslatef(1.0,0,0);
    Cloud1();
    glLoadIdentity();
    glPopMatrix();

    glPushMatrix();
    glTranslatef(CloudPosition2,0,0);
    //Copy of Cloud2
    glTranslatef(-1.1,0,0);
    Cloud2();
    glLoadIdentity();
    glPopMatrix();

    Buildings();

    glTranslatef(0.278,0.8,0);
    glScalef(0.02,0.02,0);
    Clock();
    glLoadIdentity();

    glTranslatef(0.0,-0.122,0);
    display_car1();
    display_car4();
    glLoadIdentity();

    glTranslatef(0.0,-0.134,0);
    display_car2();
    display_car3();
    display_car5();
    glLoadIdentity();

    waves();

    Bridge();

    glScalef(-0.2,0.4,0);
    glTranslatef(0,-1.0,0);
    ship();
    glLoadIdentity();

    ship2();

    glFlush();
}



void NightView()
{
    glClearColor(0.0f, 0.0f, 0.0f, 1.0f);
    glClear(GL_COLOR_BUFFER_BIT);



    NightRiver();

    NightSky();

    star();

    Moon();

    Buildings();

    glTranslatef(0.278,0.8,0);
    glScalef(0.02,0.02,0);
    Clock();
    glLoadIdentity();

    glTranslatef(0.0,-0.122,0);
    display_car1();
    glLoadIdentity();

    glTranslatef(0.0,-0.134,0);
    display_car2();
    glLoadIdentity();

    waves();

    Bridge();

    glScalef(-0.2,0.4,0);
    glTranslatef(0,-1.0,0);
    ship();
    glLoadIdentity();

    ship2();

    glFlush();
}



void WinterView()
{
    glClearColor(0.0f, 0.0f, 0.0f, 1.0f);
    glClear(GL_COLOR_BUFFER_BIT);



    WinterRiver();

    WinterSky();

    Buildings();

    glTranslatef(0.278,0.8,0);
    glScalef(0.02,0.02,0);
    Clock();
    glLoadIdentity();

    glTranslatef(0.0,-0.122,0);
    display_car1();
    display_car4();
    glLoadIdentity();

    glTranslatef(0.0,-0.134,0);
    display_car2();
    display_car3();
    display_car5();
    glLoadIdentity();

    Bridge();

    glPushMatrix();
    glTranslatef(0,snowPos,0);
    snowFall();
    glPopMatrix();

    glFlush();
}



void MonsoonView()
{
    glClearColor(0.0f, 0.0f, 0.0f, 1.0f);
    glClear(GL_COLOR_BUFFER_BIT);



    MonsoonRiver();

    MonsoonSky();

    Thunder1();
    Thunder2();

    Buildings();

    glTranslatef(0.278,0.8,0);
    glScalef(0.02,0.02,0);
    Clock();
    glLoadIdentity();

    glTranslatef(0.0,-0.122,0);
    display_car1();
    display_car4();
    glLoadIdentity();

    glTranslatef(0.0,-0.134,0);
    display_car2();
    display_car3();
    display_car5();
    glLoadIdentity();

    waves();

    Bridge();

    glScalef(-0.2,0.4,0);
    glTranslatef(0,-1.0,0);
    ship();
    glLoadIdentity();

    ship2();

    glPushMatrix();
    glScalef(0.5,0.5,0);
    glTranslatef(RainPos-4,RainPos,0);
    RainFall();
    glLoadIdentity();
    glPopMatrix();
    RainCloud();
    glFlush();
}



void DayRiver()
{
    glBegin(GL_QUADS);
    glColor3ub(32, 160, 180);
    glVertex2f(-1.0f,-0.27f);
    glVertex2f(-1.0f,-1.0f);
    glVertex2f(1.0f,-1.0f);
    glVertex2f(1.0f,-0.27f);
    glEnd();
}



void NightRiver()
{
    glBegin(GL_QUADS);
    glColor3ub(6, 55, 108);
    glVertex2f(-1.0f,-0.27f);
    glVertex2f(-1.0f,-1.0f);
    glVertex2f(1.0f,-1.0f);
    glVertex2f(1.0f,-0.27f);
    glEnd();
}



void DaySky()
{
    glBegin(GL_QUADS);
    glColor3ub(57, 162, 244);
    glVertex2f(-1.0f,1.0f);
    glColor3ub(177, 231, 247);
    glVertex2f(-1.0f,-0.15f);
    glVertex2f(1.0f,-0.15f);
    glVertex2f(1.0f,1.0f);
    glEnd();
}



void NightSky()
{
    glBegin(GL_QUADS);
    glColor3ub(3, 55, 95);
    glVertex2f(-1.0f,1.0f);
    glColor3ub(10, 15, 25);
    glVertex2f(-1.0f,-0.15f);
    glVertex2f(1.0f,-0.15f);
    glVertex2f(1.0f,1.0f);
    glEnd();
}



void WinterSky()
{
    glBegin(GL_QUADS);
    glColor3ub(209, 207, 204);
    glVertex2f(-1.0f,1.0f);
    glColor3ub(109, 123, 147);
    glVertex2f(-1.0f,-0.15f);
    glVertex2f(1.0f,-0.15f);
    glVertex2f(1.0f,1.0f);
    glEnd();
}



void CircleForCloud(GLfloat a, GLfloat b, GLfloat r)
{
    int i;

    GLfloat x=a;
    GLfloat y=b;
    GLfloat radius =r;
    int triangleAmount = 20;

    GLfloat twicePi = 2.0f * PI;

    glBegin(GL_TRIANGLE_FAN);
    glColor3ub(216, 220, 229);
    glVertex2f(x, y);
    for(i = 0; i <= triangleAmount; i++)
    {
        glVertex2f(
            x + (radius * cos(i *  twicePi / triangleAmount)),
            y + (radius * sin(i * twicePi / triangleAmount))
        );
    }
    glEnd();
}



void Cloud1()
{
    CircleForCloud(-0.93f, 0.8f, 0.05f);
    CircleForCloud(-0.88f, 0.82f, 0.05f);
    CircleForCloud(-0.83f, 0.85f, 0.06f);
    CircleForCloud(-0.78f, 0.82f, 0.06f);
    CircleForCloud(-0.73f, 0.78f, 0.04f);
    CircleForCloud(-0.75f, 0.75f, 0.05f);
    CircleForCloud(-0.78f, 0.74f, 0.04f);
    CircleForCloud(-0.81f, 0.71f, 0.05f);
    CircleForCloud(-0.84f, 0.78f, 0.04f);
    CircleForCloud(-0.87f, 0.7f, 0.05f);
    CircleForCloud(-0.9f, 0.75f, 0.04f);
}



void Cloud2()
{
    CircleForCloud(0.93f, 0.8f, 0.05f);
    CircleForCloud(0.85f, 0.82f, 0.05f);
    CircleForCloud(0.8f, 0.85f, 0.06f);
    CircleForCloud(0.75f, 0.82f, 0.06f);
    CircleForCloud(0.7f, 0.78f, 0.04f);
    CircleForCloud(0.73f, 0.75f, 0.05f);
    CircleForCloud(0.78f, 0.76f, 0.04f);
    CircleForCloud(0.81f, 0.71f, 0.05f);
    CircleForCloud(0.84f, 0.78f, 0.04f);
    CircleForCloud(0.87f, 0.7f, 0.05f);
    CircleForCloud(0.9f, 0.75f, 0.04f);
}



void Bridge()
{
    //UP TO DOWN
    //x-axis Rod-1
    glBegin(GL_QUADS);
    glColor3ub(81, 78, 82);
    glVertex2f(-1.0f,-0.15f);
    glVertex2f(-1.0f,-0.16f);
    glVertex2f(1.0f,-0.16f);
    glVertex2f(1.0f,-0.15f);
    glEnd();

    //Road
    glBegin(GL_QUADS);
    glColor3ub(81, 78, 82);
    glVertex2f(-1.0f,-0.16f);
    glVertex2f(-1.0f,-0.18f);
    glVertex2f(1.0f,-0.18f);
    glVertex2f(1.0f,-0.16f);
    glEnd();

    //x-axis Rod-2
    glBegin(GL_QUADS);
    glColor3ub(53, 35, 30);
    glVertex2f(-1.0f,-0.18f);
    glVertex2f(-1.0f,-0.2f);
    glVertex2f(1.0f,-0.2f);
    glVertex2f(1.0f,-0.18f);
    glEnd();

    //x-axis Rod-3
    glBegin(GL_QUADS);
    glColor3ub(193, 191, 194);
    glVertex2f(-1.0f,-0.2f);
    glVertex2f(-1.0f,-0.21f);
    glVertex2f(1.0f,-0.21f);
    glVertex2f(1.0f,-0.2f);
    glEnd();

    //x-axis Rod-4
    glBegin(GL_QUADS);
    glColor3ub(112, 111, 109);
    glVertex2f(-1.0f,-0.21f);
    glVertex2f(-1.0f,-0.22f);
    glVertex2f(1.0f,-0.22f);
    glVertex2f(1.0f,-0.21f);
    glEnd();

    //x-axis Rod-5
    glBegin(GL_QUADS);
    glColor3ub(21, 19, 24);
    glVertex2f(-1.0f,-0.22f);
    glVertex2f(-1.0f,-0.24f);
    glVertex2f(1.0f,-0.24f);
    glVertex2f(1.0f,-0.22f);
    glEnd();

    //x-axis Rod-6
    glBegin(GL_QUADS);
    glColor3ub(62, 43, 41);
    glVertex2f(-1.0f,-0.24f);
    glVertex2f(-1.0f,-0.26f);
    glVertex2f(1.0f,-0.26f);
    glVertex2f(1.0f,-0.24f);
    glEnd();

    //x-axis Rod-7
    glBegin(GL_QUADS);
    glColor3ub(179, 170, 161);
    glVertex2f(-1.0f,-0.26f);
    glVertex2f(-1.0f,-0.27f);
    glVertex2f(1.0f,-0.27f);
    glVertex2f(1.0f,-0.26f);
    glEnd();



    //LEFT TO RIGHT
    //y-axis rod-1
    glLineWidth(5);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();

    //y-axis rod-2
    glTranslatef(0.1,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-3
    glTranslatef(0.2,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-4
    glTranslatef(0.3,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-5
    glTranslatef(0.4,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-6
    glTranslatef(0.5,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-7
    glTranslatef(0.6,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-8
    glTranslatef(0.7,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-9
    glTranslatef(0.8,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-10
    glTranslatef(0.9,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-11
    glTranslatef(1.0,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-12
    glTranslatef(1.1,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-13
    glTranslatef(1.2,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-14
    glTranslatef(1.3,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-15
    glTranslatef(1.4,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-16
    glTranslatef(1.5,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-17
    glTranslatef(1.6,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-18
    glTranslatef(1.7,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-19
    glTranslatef(1.8,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();

    //y-axis rod-20
    glTranslatef(1.9,0,0);
    glBegin(GL_LINES);
    glColor3ub(115, 108, 102);
    glVertex2f(-0.95f,-0.21f);
    glVertex2f(-0.95f,-0.27f);
    glEnd();
    glLoadIdentity();



    //LEFT TO RIGHT
    //Diagonal rod-1
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(-0.95f,-0.265f);
    glVertex2f(-0.85f,-0.215f);
    glEnd();

    //Diagonal rod-2
    glTranslatef(0.2,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(-0.95f,-0.265f);
    glVertex2f(-0.85f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-3
    glTranslatef(0.4,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(-0.95f,-0.265f);
    glVertex2f(-0.85f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-4
    glTranslatef(0.6,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(-0.95f,-0.265f);
    glVertex2f(-0.85f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-5
    glTranslatef(0.8,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(-0.95f,-0.265f);
    glVertex2f(-0.85f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-6
    glTranslatef(1.0,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(-0.95f,-0.265f);
    glVertex2f(-0.85f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-7
    glTranslatef(1.2,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(-0.95f,-0.265f);
    glVertex2f(-0.85f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-8
    glTranslatef(1.4,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(-0.95f,-0.265f);
    glVertex2f(-0.85f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-9
    glTranslatef(1.6,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(-0.95f,-0.265f);
    glVertex2f(-0.85f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-10
    glTranslatef(1.8,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(-0.95f,-0.265f);
    glVertex2f(-0.85f,-0.215f);
    glEnd();
    glLoadIdentity();



    //RIGHT TO LEFT
    //Diagonal rod-1
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(1.05f,-0.265f);
    glVertex2f(0.95f,-0.215f);
    glEnd();

    //Diagonal rod-2
    glTranslatef(-0.2,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(1.05f,-0.265f);
    glVertex2f(0.95f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-3
    glTranslatef(-0.4,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(1.05f,-0.265f);
    glVertex2f(0.95f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-4
    glTranslatef(-0.6,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(1.05f,-0.265f);
    glVertex2f(0.95f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-5
    glTranslatef(-0.8,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(1.05f,-0.265f);
    glVertex2f(0.95f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-6
    glTranslatef(-1.0,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(1.05f,-0.265f);
    glVertex2f(0.95f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-7
    glTranslatef(-1.2,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(1.05f,-0.265f);
    glVertex2f(0.95f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-8
    glTranslatef(-1.4,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(1.05f,-0.265f);
    glVertex2f(0.95f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-9
    glTranslatef(-1.6,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(1.05f,-0.265f);
    glVertex2f(0.95f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-10
    glTranslatef(-1.8,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(1.05f,-0.265f);
    glVertex2f(0.95f,-0.215f);
    glEnd();
    glLoadIdentity();

    //Diagonal rod-11
    glTranslatef(-2.0,0,0);
    glBegin(GL_LINES);
    glColor3ub(129, 131, 136);
    glVertex2f(1.05f,-0.265f);
    glVertex2f(0.95f,-0.215f);
    glEnd();
    glLoadIdentity();



    //LEFT PILLAR
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.83f,-0.5f);
    glVertex2f(-0.8f,0.4f);
    glEnd();

    glTranslatef(0.03,0,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.83f,-0.5f);
    glVertex2f(-0.8f,0.4f);
    glEnd();
    glLoadIdentity();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.7f,-0.5f);
    glVertex2f(-0.73f,0.4f);
    glEnd();

    glTranslatef(-0.03,0,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.7f,-0.5f);
    glVertex2f(-0.73f,0.4f);
    glEnd();
    glLoadIdentity();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.8f,0.4f);
    glVertex2f(-0.73f,0.4f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.83f,-0.5f);
    glVertex2f(-0.7f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.83f,-0.5f);
    glVertex2f(-0.7f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.7f,-0.5f);
    glVertex2f(-0.83f,-0.35f);
    glEnd();

    glTranslatef(0,0.15,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.83f,-0.5f);
    glVertex2f(-0.7f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.83f,-0.5f);
    glVertex2f(-0.71f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.7f,-0.5f);
    glVertex2f(-0.82f,-0.35f);
    glEnd();
    glLoadIdentity();

    glTranslatef(0,0.3,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.82f,-0.5f);
    glVertex2f(-0.71f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.82f,-0.5f);
    glVertex2f(-0.715f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.71f,-0.5f);
    glVertex2f(-0.815f,-0.35f);
    glEnd();
    glLoadIdentity();

    glTranslatef(0,0.45,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.81f,-0.5f);
    glVertex2f(-0.72f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.82f,-0.5f);
    glVertex2f(-0.715f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.71f,-0.5f);
    glVertex2f(-0.815f,-0.35f);
    glEnd();
    glLoadIdentity();

    glTranslatef(0,0.6,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.81f,-0.5f);
    glVertex2f(-0.72f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.81f,-0.5f);
    glVertex2f(-0.72f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.72f,-0.5f);
    glVertex2f(-0.8f,-0.35f);
    glEnd();
    glLoadIdentity();

    glTranslatef(0,0.75,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.8f,-0.5f);
    glVertex2f(-0.73f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.81f,-0.5f);
    glVertex2f(-0.73f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(-0.72f,-0.5f);
    glVertex2f(-0.8f,-0.35f);
    glEnd();
    glLoadIdentity();

    glBegin(GL_QUADS);
    glColor3ub(123, 98, 92);
    glVertex2f(-0.85f,-0.5f);
    glVertex2f(-0.85f,-0.55f);
    glVertex2f(-0.68f,-0.55f);
    glVertex2f(-0.68f,-0.5f);
    glEnd();



    //RIGHT PILLAR
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.83f,-0.5f);
    glVertex2f(0.8f,0.4f);
    glEnd();

    glTranslatef(-0.03,0,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.83f,-0.5f);
    glVertex2f(0.8f,0.4f);
    glEnd();
    glLoadIdentity();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.7f,-0.5f);
    glVertex2f(0.73f,0.4f);
    glEnd();

    glTranslatef(0.03,0,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.7f,-0.5f);
    glVertex2f(0.73f,0.4f);
    glEnd();
    glLoadIdentity();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.8f,0.4f);
    glVertex2f(0.73f,0.4f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.83f,-0.5f);
    glVertex2f(0.7f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.83f,-0.5f);
    glVertex2f(0.7f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.7f,-0.5f);
    glVertex2f(0.83f,-0.35f);
    glEnd();

    glTranslatef(0,0.15,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.83f,-0.5f);
    glVertex2f(0.7f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.83f,-0.5f);
    glVertex2f(0.71f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.7f,-0.5f);
    glVertex2f(0.82f,-0.35f);
    glEnd();
    glLoadIdentity();

    glTranslatef(0,0.3,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.82f,-0.5f);
    glVertex2f(0.71f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.82f,-0.5f);
    glVertex2f(0.715f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.71f,-0.5f);
    glVertex2f(0.815f,-0.35f);
    glEnd();
    glLoadIdentity();

    glTranslatef(0,0.45,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.81f,-0.5f);
    glVertex2f(0.72f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.82f,-0.5f);
    glVertex2f(0.715f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.71f,-0.5f);
    glVertex2f(0.815f,-0.35f);
    glEnd();
    glLoadIdentity();

    glTranslatef(0,0.6,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.81f,-0.5f);
    glVertex2f(0.72f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.81f,-0.5f);
    glVertex2f(0.72f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.72f,-0.5f);
    glVertex2f(0.8f,-0.35f);
    glEnd();
    glLoadIdentity();

    glTranslatef(0,0.75,0);
    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.8f,-0.5f);
    glVertex2f(0.73f,-0.5f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.81f,-0.5f);
    glVertex2f(0.73f,-0.35f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(182, 182, 183);
    glVertex2f(0.72f,-0.5f);
    glVertex2f(0.8f,-0.35f);
    glEnd();
    glLoadIdentity();

    glBegin(GL_QUADS);
    glColor3ub(123, 98, 92);
    glVertex2f(0.85f,-0.5f);
    glVertex2f(0.85f,-0.55f);
    glVertex2f(0.68f,-0.55f);
    glVertex2f(0.68f,-0.5f);
    glEnd();



    //CURVED ROD
    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(-0.73f,0.4f);
    glVertex2f(-0.6f,0.2f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(-0.6f,0.2f);
    glVertex2f(-0.4f,0.05f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(-0.4f,0.05f);
    glVertex2f(-0.15f,-0.05f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(-0.15f,-0.05f);
    glVertex2f(-0.05f,-0.07f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(-0.05f,-0.07f);
    glVertex2f(0.0f,-0.07f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(-0.8f,0.4f);
    glVertex2f(-0.9f,0.2f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(-0.9f,0.2f);
    glVertex2f(-1.0f,0.05f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(0.73f,0.4f);
    glVertex2f(0.6f,0.2f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(0.6f,0.2f);
    glVertex2f(0.4f,0.05f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(0.4f,0.05f);
    glVertex2f(0.15f,-0.05f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(0.15f,-0.05f);
    glVertex2f(0.05f,-0.07f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(0.05f,-0.07f);
    glVertex2f(0.0f,-0.07f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(0.8f,0.4f);
    glVertex2f(0.9f,0.2f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(177, 177, 184);
    glVertex2f(0.9f,0.2f);
    glVertex2f(1.0f,0.05f);
    glEnd();



    //RODS CONNECTED TO CURVED ROD
    glLineWidth(2);
    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(-0.95f,-0.18f);
    glVertex2f(-0.95f,0.13f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(-0.85f,-0.18f);
    glVertex2f(-0.85f,0.3f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(-0.65f,-0.18f);
    glVertex2f(-0.65f,0.27f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(-0.55f,-0.18f);
    glVertex2f(-0.55f,0.17f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(-0.45f,-0.18f);
    glVertex2f(-0.45f,0.09f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(-0.35f,-0.18f);
    glVertex2f(-0.35f,0.04f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(-0.25f,-0.18f);
    glVertex2f(-0.25f,0.0f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(-0.15f,-0.18f);
    glVertex2f(-0.15f,-0.05f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(-0.05f,-0.18f);
    glVertex2f(-0.05f,-0.07f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(0.95f,-0.18f);
    glVertex2f(0.95f,0.13f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(0.85f,-0.18f);
    glVertex2f(0.85f,0.3f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(0.65f,-0.18f);
    glVertex2f(0.65f,0.27f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(0.55f,-0.18f);
    glVertex2f(0.55f,0.17f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(0.45f,-0.18f);
    glVertex2f(0.45f,0.09f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(0.35f,-0.18f);
    glVertex2f(0.35f,0.04f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(0.25f,-0.18f);
    glVertex2f(0.25f,0.0f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(0.15f,-0.18f);
    glVertex2f(0.15f,-0.05f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(121, 121, 125);
    glVertex2f(0.05f,-0.18f);
    glVertex2f(0.05f,-0.07f);
    glEnd();
}



void Clock()
{
    OuterCircleForClock(0.0f, 0.0f, 1.0f);

    glPushMatrix();
    glRotatef(ClockHour,0.0,0.0,0.1);
    glBegin(GL_TRIANGLES);
    glColor3ub(0,0,0);
    glVertex2f(-0.05f,0.0f);
    glVertex2f(0.05f,0.0f);
    glVertex2f(0.0f,0.6f);
    glEnd();
    glPopMatrix();
    ClockHour-=0.01f;

    glPushMatrix();
    glRotatef(ClockMinute,0.0,0.0,0.1);
    glBegin(GL_TRIANGLES);
    glColor3ub(0,0,0);
    glVertex2f(0.0f,0.05f);
    glVertex2f(0.0f,-0.05f);
    glVertex2f(0.75f,0.0f);
    glEnd();
    glPopMatrix();
    ClockMinute-=0.03f;

    glPushMatrix();
    glRotatef(ClockSecond,0.0,0.0,0.1);
    glLineWidth(2);
    glBegin(GL_LINES);
    glColor3ub(255,0,0);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.75f,0.0f);
    glEnd();
    glPopMatrix();
    ClockSecond-=0.1f;

    InnerCircleForClock(0.0f, 0.0f, 0.1f);

    glLineWidth(7);
    glBegin(GL_LINES);
    glColor3ub(0,0,0);
    glVertex2f(0.0f,-1.0f);
    glVertex2f(0.0f,-0.8f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(0,0,0);
    glVertex2f(0.0f,1.0f);
    glVertex2f(0.0f,0.8f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(0,0,0);
    glVertex2f(-1.0f,0.0f);
    glVertex2f(-0.8f,0.0f);
    glEnd();

    glBegin(GL_LINES);
    glColor3ub(0,0,0);
    glVertex2f(1.0f,0.0f);
    glVertex2f(0.8f,0.0f);
    glEnd();
}



void Idle()
{
    glutPostRedisplay();
}



void OuterCircleForClock(GLfloat a, GLfloat b, GLfloat r)
{
    int i;

    GLfloat x=a;
    GLfloat y=b;
    GLfloat radius =r;
    int triangleAmount = 20;

    GLfloat twicePi = 2.0f * PI;

    glBegin(GL_TRIANGLE_FAN);
    glColor3ub(255,255,255);
    glVertex2f(x, y);
    for(i = 0; i <= triangleAmount; i++)
    {
        glVertex2f(
            x + (radius * cos(i *  twicePi / triangleAmount)),
            y + (radius * sin(i * twicePi / triangleAmount))
        );
    }
    glEnd();
}



void InnerCircleForClock(GLfloat a, GLfloat b, GLfloat r)
{
    int i;

    GLfloat x=a;
    GLfloat y=b;
    GLfloat radius =r;
    int triangleAmount = 20;

    GLfloat twicePi = 2.0f * PI;

    glBegin(GL_TRIANGLE_FAN);
    glColor3ub(255,0,0);
    glVertex2f(x, y);
    for(i = 0; i <= triangleAmount; i++)
    {
        glVertex2f(
            x + (radius * cos(i *  twicePi / triangleAmount)),
            y + (radius * sin(i * twicePi / triangleAmount))
        );
    }
    glEnd();
}



void CloudAnimation1(int value)
{
    if(CloudPosition1 > 1.8)
        CloudPosition1 = -1.6f;

    CloudPosition1 += CloudSpeed1;

    glutPostRedisplay();

    glutTimerFunc(40, CloudAnimation1, 0);
}



void CloudAnimation2(int value)
{
    if(CloudPosition2 > 1.0)
        CloudPosition2 = -1.0f;

    CloudPosition2 += CloudSpeed2;

    glutPostRedisplay();

    glutTimerFunc(40, CloudAnimation2, 0);
}



void Sun()
{
    int i;

    GLfloat x=0.9f;
    GLfloat y=0.9f;
    GLfloat radius =0.2f;
    int triangleAmount = 20;

    GLfloat twicePi = 2.0f * PI;

    glBegin(GL_TRIANGLE_FAN);
    glColor3ub(245, 245, 40);
    glVertex2f(x, y);
    for(i = 0; i <= triangleAmount; i++)
    {
        glVertex2f(
            x + (radius * cos(i *  twicePi / triangleAmount)),
            y + (radius * sin(i * twicePi / triangleAmount))
        );
    }
    glEnd();
}



void Moon()
{
    int i;

    GLfloat x=0.9f;
    GLfloat y=0.9f;
    GLfloat radius =0.2f;
    int triangleAmount = 20;

    GLfloat twicePi = 2.0f * PI;

    glBegin(GL_TRIANGLE_FAN);
    glColor3ub(236, 236, 236);
    glVertex2f(x, y);
    for(i = 0; i <= triangleAmount; i++)
    {
        glVertex2f(
            x + (radius * cos(i *  twicePi / triangleAmount)),
            y + (radius * sin(i * twicePi / triangleAmount))
        );
    }
    glEnd();
}



void handleKeypress(unsigned char key, int x, int y)
{
    switch (tolower(key))
    {
    case 'd':
        glutDisplayFunc(DayView);
        isNight = false;
        //CarShipSound();
        glutPostRedisplay();
        break;

    case 'n':
        glutDisplayFunc(NightView);
        isNight=true;
        //CarShipSound();
        glutPostRedisplay();
        break;

    case 'w':
        glutDisplayFunc(WinterView);
        isNight = false;
        //CarSound();
        glutPostRedisplay();
        break;

    case 'm':
        glutDisplayFunc(MonsoonView);
        isNight = true;
        //RainThunderSound();
        glutPostRedisplay();
        break;

    case 'o':
        //SoundOff();
        glutPostRedisplay();
        break;
    }
}



void ShipSound()
{
    PlaySound("ShipSound.wav", NULL, SND_ASYNC|SND_FILENAME|SND_LOOP);
}



void CarSound()
{
    PlaySound("CarSound.wav", NULL, SND_ASYNC|SND_FILENAME|SND_LOOP);
}



void CarShipSound()
{
    PlaySound("CarShipSound.wav", NULL, SND_ASYNC|SND_FILENAME|SND_LOOP);
}



void RainThunderSound()
{
    PlaySound("RainThunderSound.wav", NULL, SND_ASYNC|SND_FILENAME|SND_LOOP);
}



void SoundOff()
{
    PlaySound(NULL, NULL, SND_ASYNC|SND_FILENAME|SND_LOOP);
}



void window1()
{

    if( !isNight )
    {

        glBegin(GL_QUADS);
        glColor3ub( 250, 250, 250);
        glVertex2f(0.12,-0.12);
        glVertex2f(-0.12,-0.12);
        glVertex2f(-0.12,0.12);
        glVertex2f(0.12,0.12);
        glEnd();

        glBegin(GL_QUADS);
        glColor3ub(114, 207, 248);
        glVertex2f(0.1,-0.1);
        glVertex2f(-0.1,-0.1);
        glVertex2f(-0.1,0.1);
        glVertex2f(0.1,0.1);
        glEnd();
    }


    if(isNight)
    {
        glBegin(GL_QUADS);
        glColor3ub( 250, 250, 250);
        glVertex2f(0.12,-0.12);
        glVertex2f(-0.12,-0.12);
        glVertex2f(-0.12,0.12);
        glVertex2f(0.12,0.12);
        glEnd();

        glBegin(GL_QUADS);
        glColor3ub(241, 201, 8);
        glVertex2f(0.1,-0.1);
        glVertex2f(-0.1,-0.1);
        glVertex2f(-0.1,0.1);
        glVertex2f(0.1,0.1);
        glEnd();

        //isNight = false;
    }


}



void window2()
{

    if ( !isNight )
    {
        glBegin(GL_QUADS);
        glColor3ub( 250, 250, 250);
        glVertex2f(0.12,-0.12);
        glVertex2f(-0.12,-0.12);
        glVertex2f(-0.12,0.12);
        glVertex2f(0.12,0.12);
        glEnd();

        glBegin(GL_QUADS);
        glColor3ub(114, 207, 248);
        glVertex2f(0.1,-0.1);
        glVertex2f(-0.1,-0.1);
        glVertex2f(-0.1,0.1);
        glVertex2f(0.1,0.1);
        glEnd();

        glLineWidth(5);
        glBegin(GL_LINES);
        glColor3ub(231, 247, 253);
        glVertex2f(-0.06,-0.08);
        glVertex2f(0.05,0.1);
    }

    if ( isNight )
    {
        glBegin(GL_QUADS);
        glColor3ub( 250, 250, 250);
        glVertex2f(0.12,-0.12);
        glVertex2f(-0.12,-0.12);
        glVertex2f(-0.12,0.12);
        glVertex2f(0.12,0.12);
        glEnd();

        glBegin(GL_QUADS);
        glColor3ub(241, 201, 8);
        glVertex2f(0.1,-0.1);
        glVertex2f(-0.1,-0.1);
        glVertex2f(-0.1,0.1);
        glVertex2f(0.1,0.1);
        glEnd();

        glLineWidth(5);
        glBegin(GL_LINES);
        glColor3ub(241, 201, 8);
        glVertex2f(-0.06,-0.08);
        glVertex2f(0.05,0.1);
    }

    glEnd();
}



void apart1()
{
    //bottom floor
    glBegin(GL_QUADS);
    glColor3ub(138,164,179);
    glVertex2f(0.7,-0.9);
    glVertex2f(-0.7,-0.9);
    glVertex2f(-0.7,-0.0);
    glVertex2f(0.7,-0.0);
    glEnd();

    //1st floor
    glBegin(GL_QUADS);
    glColor3ub(138,164,179);
    glVertex2f(0.5,-0.0);
    glVertex2f(-0.5,-0.0);
    glVertex2f(-0.5,0.30);
    glVertex2f(0.5,0.30);
    glEnd();

    //2nd floor
    glBegin(GL_QUADS);
    glColor3ub(138,164,179);
    glVertex2f(0.3,0.30);
    glVertex2f(-0.3,0.30);
    glVertex2f(-0.3,0.60);
    glVertex2f(0.3,0.60);
    glEnd();

    //top floor
    glBegin(GL_QUADS);
    glColor3ub(138,164,179);
    glVertex2f(0.1,0.50);
    glVertex2f(-0.1,0.50);
    glVertex2f(-0.1,0.90);
    glVertex2f(0.1,0.90);
    glEnd();

    float bttmWindowUD = (-0.60);
    float bttmWindowLR =  (-0.60);

    for(int i=0; i<3; i++)
    {
        for(int j=0; j<=6; j++)
        {
            glPushMatrix();
            glTranslated(bttmWindowLR,bttmWindowUD,0);
            glScaled(0.3,0.3,0);

            window1();

            glLoadIdentity();
            glPopMatrix();
            bttmWindowLR += 0.2;
        }
        bttmWindowLR = (-0.60);
        bttmWindowUD += 0.2;
    }

    float FirstWindowUD = (-0.0);
    float FirstWindowLR = (-0.60 + 0.2);

    for(int i=0; i<2; i++)
    {
        for(int j=0; j<=4; j++)
        {
            glPushMatrix();
            glTranslated(FirstWindowLR,FirstWindowUD,0);
            glScaled(0.3,0.3,0);

            window1();

            glLoadIdentity();
            glPopMatrix();
            FirstWindowLR += 0.2;
        }
        FirstWindowLR = (-0.60 + 0.2);
        FirstWindowUD += 0.2;
    }

    float SecondtWindowUD = (0.35);
    float SecondtWindowLR = -0.60 + 0.2*2;

    for(int i=0; i<2; i++)
    {
        for(int j=0; j<=2; j++)
        {
            glPushMatrix();
            glTranslated(SecondtWindowLR,SecondtWindowUD,0);
            glScaled(0.3,0.3,0);

            window1();

            glLoadIdentity();
            glPopMatrix();
            SecondtWindowLR += 0.2;
        }
        SecondtWindowLR = -0.60 + 0.2*2;
        SecondtWindowUD += 0.2;
    }

    //bottom mat
    glBegin(GL_QUADS);
    glColor3ub(42, 56, 54);
    glVertex2f(0.2,-0.90);
    glVertex2f(-0.2,-0.9);
    glVertex2f(-0.2,-0.86);
    glVertex2f(0.2,-0.86);
    glEnd();

    //Entrance outline black
    glBegin(GL_QUADS);
    glColor3ub( 250, 250, 250);
    glVertex2f(0.1,-0.86);
    glVertex2f(-0.1,-0.86);
    glVertex2f(-0.1,-0.75);
    glVertex2f(0.1,-0.75);
    glEnd();

    //Entrance glass view
    glBegin(GL_QUADS);
    glColor3ub(185, 233, 249);
    glVertex2f(0.09,-0.86);
    glVertex2f(-0.09,-0.86);
    glVertex2f(-0.09,-0.77);
    glVertex2f(0.09,-0.77);
    glEnd();

    //glass reflection
    glPushMatrix();
    glTranslated(-0.02,-0.18,0);
    glScaled(-1,0.88,0);
    glLineWidth(9);
    glBegin(GL_LINES);
    glColor3ub(231, 247, 253);
    glVertex2f(-0.07,-0.77);
    glVertex2f(-0.09,-0.67);
    glEnd();
    glLoadIdentity();
    glPopMatrix();

    //glass reflection
    float posOfLine = -0.04;
    for(int i=0; i<6; i++)
    {
        glPushMatrix();
        glTranslated(posOfLine,-0.18,0);
        glScaled(-1,0.88,0);
        glLineWidth(9);
        glBegin(GL_LINES);
        glColor3ub(231, 247, 253);
        glVertex2f(-0.07,-0.77);
        glVertex2f(-0.09,-0.67);
        glEnd();
        glLoadIdentity();
        glPopMatrix();
        posOfLine -= 0.02;
    }

    glBegin(GL_QUADS);
    glColor3ub( 250, 250, 250);
    glVertex2f(0.0,-0.86);
    glVertex2f(-0.01,-0.86);
    glVertex2f(-0.01,-0.75);
    glVertex2f(0.0,-0.75);
    glEnd();
}



void buildingside()
{
    if(!isNight)
    {
        glBegin(GL_QUADS);
        glColor3ub(54, 44, 31);
        glVertex2f(0.1,-0.90);
        glVertex2f(0.3,-0.90);
        glVertex2f(0.3,-0.88);
        glVertex2f(0.1,-0.88);
        glEnd();
    }
    if( isNight )
    {
        glBegin(GL_QUADS);
        glColor3ub(241, 201, 8);
        glVertex2f(0.1,-0.90);
        glVertex2f(0.3,-0.90);
        glVertex2f(0.3,-0.88);
        glVertex2f(0.1,-0.88);
        glEnd();
    }
}



void cross()
{
    glLineWidth(8);
    glBegin(GL_LINES);
    glColor3ub(164, 134, 93);
    glVertex2f(-0.1,-0.1);
    glVertex2f(0.1,0.1);
    glEnd();

    glLineWidth(8);
    glBegin(GL_LINES);
    glColor3ub(164, 134, 93);
    glVertex2f(-0.1,0.1);
    glVertex2f(0.1,-0.1);
    glEnd();

    glLineWidth(8);
    glBegin(GL_LINES);
    glColor3ub(164, 134, 93);
    glVertex2f(-0.1,0.0);
    glVertex2f(0.1,0.0);
    glEnd();

    glLineWidth(2);
    glBegin(GL_LINES);
    glColor3ub( 250, 250, 250);
    glVertex2f(-0.1,-0.1);
    glVertex2f(0.1,0.1);
    glEnd();

    glLineWidth(2);
    glBegin(GL_LINES);
    glColor3ub( 250, 250, 250);
    glVertex2f(-0.1,0.1);
    glVertex2f(0.1,-0.1);
    glEnd();

    glLineWidth(2);
    glBegin(GL_LINES);
    glColor3ub( 250, 250, 250);
    glVertex2f(-0.1,0.0);
    glVertex2f(0.1,0.0);
    glEnd();

    glLineWidth(4);
    glBegin(GL_LINES);
    glColor3ub(164, 134, 93);
    glVertex2f(-0.1,0.1);
    glVertex2f(0.1,0.1);
    glEnd();

    glLineWidth(4);
    glBegin(GL_LINES);
    glColor3ub(164, 134, 93);
    glVertex2f(-0.1,-0.1);
    glVertex2f(0.1,-0.1);
    glEnd();
}



void leftBuildingOfapart2()
{
    glBegin(GL_QUADS);
    glColor3ub(182, 154, 110);
    glVertex2f(0.1,-0.90);
    glVertex2f(-0.0,-0.90);
    glVertex2f(-0.0,0.90);
    glVertex2f(0.1,0.90);
    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(109, 89, 62);
    glVertex2f(0.1,-0.90);
    glVertex2f(0.2,-0.90);
    glVertex2f(0.2,0.80);
    glVertex2f(0.1,0.80);
    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(164, 134, 93);
    glVertex2f(0.2,-0.90);
    glVertex2f(0.3,-0.90);
    glVertex2f(0.3,0.70);
    glVertex2f(0.2,0.70);
    glEnd();
}



void apart2 ()
{
    leftBuildingOfapart2();

    double leftBuildingWindowUD = (-0.85);
    double leftBuildingWindowLR = (0.02);
    for(int i=0; i<15; i++)
    {
        for(int j=0; j<=2; j++)
        {
            glPushMatrix();
            glTranslated(leftBuildingWindowLR,leftBuildingWindowUD,0);
            glScaled(0.08,0.2,0);
            window2();
            glLoadIdentity();
            glPopMatrix();
            leftBuildingWindowLR += 0.03;
        }
        leftBuildingWindowLR = (0.02);
        leftBuildingWindowUD += 0.1;
    }

    glPushMatrix();
    glTranslated(0.05,0.65,0);
    glScaled(0.3,0.5,0);
    window2();
    glLoadIdentity();
    glPopMatrix();

    float side = 0.01;
    for(int i=0; i<25; i++)
    {
        glPushMatrix();
        glTranslated(0,side,0);
        buildingside();
        glLoadIdentity();
        glPopMatrix();
        side += 0.06;
    }

    double  buiildingBridge = 0.33;
    for (int i=0; i<3; i++)
    {
        glPushMatrix();
        glTranslated(buiildingBridge,0,0);
        glScaled(0.3,0.3,0);
        cross();
        glLoadIdentity();
        glPopMatrix();
        buiildingBridge += 0.058;
    }

    glPushMatrix();
    glTranslated(0.77,0,0);
    glScaled(-1,1,0);
    leftBuildingOfapart2();
    glLoadIdentity();
    glPopMatrix();

    double leftBuildingWindowUD2 = (-0.85);
    double leftBuildingWindowLR2 = (0.75);
    for(int i=0; i<15; i++)
    {
        for(int j=0; j<=2; j++)
        {
            glPushMatrix();
            glTranslated(leftBuildingWindowLR2,leftBuildingWindowUD2,0);
            glScaled(0.08,0.2,0);
            window2();
            glLoadIdentity();
            glPopMatrix();
            leftBuildingWindowLR2 -= 0.033;
        }
        leftBuildingWindowLR2 = (0.75);
        leftBuildingWindowUD2+= 0.1;
    }
    glPushMatrix();
    glTranslated(0.71,0.65,0);
    glScaled(0.3,0.5,0);
    window2();
    glLoadIdentity();
    glPopMatrix();

    float side2 = 0.01;
    for(int i=0; i<25; i++)
    {
        glPushMatrix();
        glTranslated(0.37,side2,0);
        buildingside();
        glLoadIdentity();
        glPopMatrix();
        side2 += 0.06;
    }
}



void apart3()
{
    //whole build
    glBegin(GL_QUADS);
    glColor3ub(89, 76, 66);
    glVertex2f(0.3,-0.90);
    glVertex2f(-0.3,-0.90);
    glVertex2f(-0.3,0.90);
    glVertex2f(0.3,0.90);
    glEnd();

    //bottom around doors
    glBegin(GL_QUADS);
    glColor3ub(40, 54, 61);
    glVertex2f(-0.25,-0.90);
    glVertex2f(0.25,-0.90);
    glVertex2f( 0.25,-0.73);
    glVertex2f(-0.25,-0.73);
    glEnd();

    //door mirror

    if(!isNight)
    {
        glBegin(GL_QUADS);
        glColor3ub(134, 167, 199);
        glVertex2f(0.2,-0.90);
        glVertex2f( 0.1,-0.90);
        glVertex2f( 0.1,-0.75);
        glVertex2f(0.2,-0.75);
        glEnd();

        glBegin(GL_QUADS);
        glColor3ub(134, 167, 199);
        glVertex2f(-0.2,-0.90);
        glVertex2f(-0.1,-0.90);
        glVertex2f(- 0.1,-0.75);
        glVertex2f(-0.2,-0.75);
        glEnd();

        glBegin(GL_QUADS);
        glColor3ub(134, 167, 199);
        glVertex2f(-0.05,-0.90);
        glVertex2f(0.05,-0.90);
        glVertex2f( 0.05,-0.75);
        glVertex2f(-0.05,-0.75);
        glEnd();

    }

    if(isNight)
    {
        glBegin(GL_QUADS);
        glColor3ub(241, 201, 8);
        glVertex2f(0.2,-0.90);
        glVertex2f( 0.1,-0.90);
        glVertex2f( 0.1,-0.75);
        glVertex2f(0.2,-0.75);
        glEnd();

        glBegin(GL_QUADS);
        glColor3ub(241, 201, 8);
        glVertex2f(-0.2,-0.90);
        glVertex2f(-0.1,-0.90);
        glVertex2f(- 0.1,-0.75);
        glVertex2f(-0.2,-0.75);
        glEnd();

        glBegin(GL_QUADS);
        glColor3ub(241, 201, 8);
        glVertex2f(-0.05,-0.90);
        glVertex2f(0.05,-0.90);
        glVertex2f( 0.05,-0.75);
        glVertex2f(-0.05,-0.75);
        glEnd();

    }

    //line that seps upper and lower door mirror
    glLineWidth(8);
    glBegin(GL_LINES);
    glColor3ub(40, 54, 61);
    glVertex2f(-0.25,-0.80);
    glVertex2f(0.25,-0.80);
    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(36, 36, 34);
    glVertex2f(-0.30,-0.73);
    glVertex2f(0.30,-0.73);
    glVertex2f( 0.26,-0.67);
    glVertex2f(-0.26,-0.67);
    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(36, 36, 34);
    glVertex2f(-0.29,-0.60);
    glVertex2f(0.29,-0.60);
    glVertex2f( 0.29,-0.50);
    glVertex2f(-0.29,-0.50);
    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(36, 36, 34);
    glVertex2f(-0.29,-0.60);
    glVertex2f(0.29,-0.60);
    glVertex2f( 0.29,-0.50);
    glVertex2f(-0.29,-0.50);
    glEnd();

    if(!isNight)
    {
        glBegin(GL_QUADS);
        glColor3ub(210, 214, 224);
        glVertex2f(0.28,-0.40);
        glVertex2f(-0.28,-0.40);
        glVertex2f(-0.28,0.75);
        glVertex2f(0.28,0.75);
        glEnd();

        glBegin(GL_QUADS);
        glColor3ub(27, 27, 27);
        glVertex2f(-0.28,0.76);
        glVertex2f(0.28,0.76);
        glVertex2f( 0.28,0.88);
        glVertex2f(-0.28,0.88);
        glEnd();

    }

    if(isNight)
    {
        glBegin(GL_QUADS);
        glColor3ub(241, 201, 8);
        glVertex2f(0.28,-0.40);
        glVertex2f(-0.28,-0.40);
        glVertex2f(-0.28,0.75);
        glVertex2f(0.28,0.75);
        glEnd();

        glBegin(GL_QUADS);
        glColor3ub(241, 201, 8);
        glVertex2f(-0.28,0.76);
        glVertex2f(0.28,0.76);
        glVertex2f( 0.28,0.88);
        glVertex2f(-0.28,0.88);
        glEnd();

    }

    //blue roof
    glBegin(GL_QUADS);
    glColor3ub(61, 71, 112);
    glVertex2f(-0.30,0.90);
    glVertex2f(0.30,0.90);
    glVertex2f( 0.30,0.98);
    glVertex2f(-0.30,0.98);
    glEnd();

    //blue roof
    glBegin(GL_QUADS);
    glColor3ub(61, 71, 112);
    glVertex2f(-0.30,0.98);
    glVertex2f(0.30,0.98);
    glVertex2f( 0.1,1.0);
    glVertex2f(-0.1,1.0);
    glEnd();

    //blue roof
    glBegin(GL_QUADS);
    glColor3ub(61, 71, 112);
    glVertex2f(-0.30,0.98);
    glVertex2f(0.30,0.98);
    glVertex2f( 0.1,1.0);
    glVertex2f(-0.1,1.0);
    glEnd();

    //blue roof
    glBegin(GL_QUADS);
    glColor3ub(61, 71, 112);
    glVertex2f(-0.10,1);
    glVertex2f(0.10,1);
    glVertex2f( 0.05,1.2);
    glVertex2f(-0.05,1.2);
    glEnd();

    //blue roof
    glBegin(GL_LINES);
    glColor3ub(61, 71, 112);
    glVertex2f(-0.0,1);
    glVertex2f(0.0,1.5);
    glEnd();

    float ud =  -0.40;
    for(int i=0; i<13; i++)
    {
        glBegin(GL_LINES);
        glColor3ub(89, 76, 66);
        glVertex2d(-0.3,ud);
        glVertex2d(0.3,ud);
        glEnd();
        ud += 0.08;
    }

    float lr =  -0.15;
    for(int i=0; i<3; i++)
    {
        glBegin(GL_LINES);
        glColor3ub(89, 76, 66);
        glVertex2d(lr,0.9);
        glVertex2d(lr,-0.6);
        glEnd();
        lr += 0.15;
    }
}



void Circle(GLfloat a, GLfloat b, GLfloat r,int R,int G,int B)
{
    int i;

    GLfloat x=a;
    GLfloat y=b;
    GLfloat radius =r;
    int triangleAmount = 20;

    GLfloat twicePi = 2.0f * PI;

    glBegin(GL_TRIANGLE_FAN);
    glColor3ub(R, G, B);
    glVertex2f(x, y);
    for(i = 0; i <= triangleAmount/2; i++)
    {
        glVertex2f(
            x + (radius * cos(i *  twicePi / triangleAmount)),
            y + 6*(radius * sin(i * twicePi / triangleAmount))
        );
    }
    glEnd();
}



void apart4()
{
    glBegin(GL_QUADS);
    glColor3ub(119, 130, 135);
    glVertex2f(0.3,-0.90);
    glVertex2f(-0.3,-0.90);
    glVertex2f(-0.3,0.);
    glVertex2f(0.3,0.);
    glEnd();

    Circle(0.0f,-0.2,0.3,119, 130, 135);

    if(!isNight)
    {
        glBegin(GL_QUADS);
        glColor3ub(134, 167, 199);
        glVertex2f(-0.28,-0.88);
        glVertex2f(0.28,-0.88);
        glVertex2f( 0.28,0.0);
        glVertex2f(-0.28,0.0);
        glEnd();
        Circle(0.0f,-0.23,0.28,134, 167, 199);
    }


    if(isNight)
    {
        glBegin(GL_QUADS);
        glColor3ub(241, 201, 8);
        glVertex2f(-0.28,-0.88);
        glVertex2f(0.28,-0.88);
        glVertex2f( 0.28,0.0);
        glVertex2f(-0.28,0.0);
        glEnd();
        Circle(0.0f,-0.23,0.28,241, 201, 8);
    }


    for(double i= (-0.1); i<=0.1;)
    {
        glLineWidth(4);
        glBegin(GL_LINES);
        glColor3ub(119, 130, 135);
        glVertex2f(i,-0.90);
        glVertex2f(i,1.45);
        glEnd();

        i += 0.05;
    }

    for(double i= (-0.8); i<=0.0;)
    {
        glLineWidth(4);
        glBegin(GL_LINES);
        glColor3ub(119, 130, 135);
        glVertex2f(-0.3,i);
        glVertex2f(0.3,i);
        glEnd();

        i += 0.05;
    }
}



void apart5()
{
    glBegin(GL_QUADS);
    glColor3ub(39, 98, 156);
    glVertex2f(0.2,-0.90);
    glVertex2f(-0.0,-0.90);
    glVertex2f(-0.0,0.90);
    glVertex2f(0.2,0.90);
    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(25, 57, 95);
    glVertex2f(0.3,-0.90);
    glVertex2f(0.2,-0.90);
    glVertex2f(0.2,0.90);
    glVertex2f(0.3,0.90);
    glEnd();

    float side = 0.8;
    for(int i=0; i<18; i++)
    {
        glPushMatrix();
        glTranslated(-0.1,side,0);
        glScaled(1,1.8,0);


        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(82, 169, 223);
        }
        if(isNight)
        {
            glColor3ub(241, 201, 8);
        }
        glVertex2f(0.1,-0.90);
        glVertex2f(0.29,-0.90);
        glVertex2f(0.29,-0.87);
        glVertex2f(0.1,-0.87);
        glEnd();

        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(7, 27, 51);
        }
        if(isNight)
        {
            glColor3ub(241, 201, 8);
        }

        glVertex2f(0.35,-0.90);
        glVertex2f(0.4,-0.90);
        glVertex2f(0.4,-0.87);
        glVertex2f(0.35,-0.87);
        glEnd();

        glLoadIdentity();
        glPopMatrix();
        side += 0.09;
    }
}



void apart6()
{
    glBegin(GL_QUADS);
    glColor3ub(95, 182, 147);
    glVertex2f(0.2,-0.90);
    glVertex2f(-0.01,-0.90);
    glVertex2f(-0.01,0.90);
    glVertex2f(0.2,0.90);
    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(52, 124, 101);
    glVertex2f(0.3,-0.90);
    glVertex2f(0.2,-0.90);
    glVertex2f(0.2,0.90);
    glVertex2f(0.3,0.90);
    glEnd();

    float side = 0.8;
    for(int i=0; i<18; i++)
    {
        glPushMatrix();
        glTranslated(-0.1,side,0);
        glScaled(1,1.8,0);

        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(17, 50, 57);
        }
        if(isNight)
        {
            glColor3ub(241, 201, 8);
        }
        glVertex2f(0.1,-0.90);
        glVertex2f(0.29,-0.90);
        glVertex2f(0.29,-0.87);
        glVertex2f(0.1,-0.87);
        glEnd();

        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(7, 27, 51);
        }
        if(isNight)
        {
            glColor3ub(241, 201, 8);
        }
        glVertex2f(0.35,-0.90);
        glVertex2f(0.4,-0.90);
        glVertex2f(0.4,-0.87);
        glVertex2f(0.35,-0.87);
        glEnd();

        glLoadIdentity();
        glPopMatrix();
        side += 0.09;
    }
}



void apart7()
{
    glBegin(GL_QUADS);
    glColor3ub(38, 41, 65);
    glVertex2f(0.2,-0.90);
    glVertex2f(-0.01,-0.90);
    glVertex2f(-0.01,0.90);
    glVertex2f(0.2,0.90);
    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(9, 9, 9);
    glVertex2f(0.3,-0.90);
    glVertex2f(0.2,-0.90);
    glVertex2f(0.2,0.90);
    glVertex2f(0.3,0.90);
    glEnd();

    float side = 0.8;
    for(int i=0; i<18; i++)
    {
        glPushMatrix();
        glTranslated(-0.1,side,0);
        glScaled(1,1.8,0);

        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(134, 135, 181);
        }
        if(isNight)
        {
            glColor3ub(210, 214, 224);
        }
        glVertex2f(0.1,-0.90);
        glVertex2f(0.29,-0.90);
        glVertex2f(0.29,-0.87);
        glVertex2f(0.1,-0.87);
        glEnd();

        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(7, 27, 51);
        }
        if(isNight)
        {
            glColor3ub(210, 214, 224);
        }

        glVertex2f(0.35,-0.90);
        glVertex2f(0.4,-0.90);
        glVertex2f(0.4,-0.87);
        glVertex2f(0.35,-0.87);
        glEnd();

        glLoadIdentity();
        glPopMatrix();
        side += 0.09;
    }
}



void apart8()
{
    glBegin(GL_QUADS);
    glColor3ub(109, 89, 62);
    glVertex2f(0.2,-0.90);
    glVertex2f(-0.01,-0.90);
    glVertex2f(-0.01,0.90);
    glVertex2f(0.2,0.90);
    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(109, 89, 62);
    glVertex2f(0.3,-0.90);
    glVertex2f(0.2,-0.90);
    glVertex2f(0.2,0.90);
    glVertex2f(0.3,0.90);
    glEnd();

    float side = 0.8;
    for(int i=0; i<18; i++)
    {
        glPushMatrix();
        glTranslated(-0.1,side,0);
        glScaled(1,1.8,0);

        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(134, 135, 181);
        }
        if(isNight)
        {
            glColor3ub(241, 201, 8);
        }
        glVertex2f(0.1,-0.90);
        glVertex2f(0.29,-0.90);
        glVertex2f(0.29,-0.87);
        glVertex2f(0.1,-0.87);
        glEnd();

        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(7, 27, 51);
        }
        if(isNight)
        {
            glColor3ub(241, 201, 8);
        }
        glVertex2f(0.35,-0.90);
        glVertex2f(0.4,-0.90);
        glVertex2f(0.4,-0.87);
        glVertex2f(0.35,-0.87);
        glEnd();

        glLoadIdentity();
        glPopMatrix();
        side += 0.09;
    }
}



void apart9()
{
    glBegin(GL_QUADS);
    glColor3ub(201, 201, 201);
    glVertex2f(0.2,-0.90);
    glVertex2f(-0.01,-0.90);
    glVertex2f(-0.01,0.90);
    glVertex2f(0.2,0.90);
    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(236, 236, 236);
    glVertex2f(0.3,-0.90);
    glVertex2f(0.2,-0.90);
    glVertex2f(0.2,0.90);
    glVertex2f(0.3,0.90);
    glEnd();

    float side = 0.8;
    for(int i=0; i<18; i++)
    {
        glPushMatrix();
        glTranslated(-0.1,side,0);
        glScaled(1,1.8,0);

        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(69, 112, 139);
        }
        if(isNight)
        {
            glColor3ub(241, 201, 8);
        }
        glColor3ub(69, 112, 139);
        glVertex2f(0.1,-0.90);
        glVertex2f(0.29,-0.90);
        glVertex2f(0.29,-0.87);
        glVertex2f(0.1,-0.87);
        glEnd();

        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(69, 112, 139);
        }
        if(isNight)
        {
            glColor3ub(210, 214, 224);
        }
        glVertex2f(0.35,-0.90);
        glVertex2f(0.4,-0.90);
        glVertex2f(0.4,-0.87);
        glVertex2f(0.35,-0.87);
        glEnd();

        glLoadIdentity();
        glPopMatrix();
        side += 0.09;
    }
}



void apart10()
{
    glBegin(GL_QUADS);
    glColor3ub(149, 32, 51);
    glVertex2f(0.2,-0.90);
    glVertex2f(-0.01,-0.90);
    glVertex2f(-0.01,0.90);
    glVertex2f(0.2,0.90);
    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(99, 37, 52);
    glVertex2f(0.3,-0.90);
    glVertex2f(0.2,-0.90);
    glVertex2f(0.2,0.90);
    glVertex2f(0.3,0.90);
    glEnd();

    float side = 0.8;
    for(int i=0; i<18; i++)
    {
        glPushMatrix();
        glTranslated(-0.1,side,0);
        glScaled(1,1.8,0);

        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(134, 135, 181);
        }
        if(isNight)
        {
            glColor3ub(241, 201, 8);
        }
        glVertex2f(0.1,-0.90);
        glVertex2f(0.29,-0.90);
        glVertex2f(0.29,-0.87);
        glVertex2f(0.1,-0.87);
        glEnd();

        glBegin(GL_QUADS);
        if(!isNight)
        {
            glColor3ub(7, 27, 51);
        }
        if(isNight)
        {
            glColor3ub(241, 201, 8);
        }
        glVertex2f(0.35,-0.90);
        glVertex2f(0.4,-0.90);
        glVertex2f(0.4,-0.87);
        glVertex2f(0.35,-0.87);
        glEnd();

        glLoadIdentity();
        glPopMatrix();
        side += 0.09;
    }
}



void Buildings()
{
    glScaled(0.3,0.3,0);
    glTranslated(-3.35,0.4,0);
    apart5();
    glLoadIdentity();

    glScaled(0.27,0.35,0);
    glTranslated(-3.09,0.45,0);
    apart3();
    glLoadIdentity();

    glScaled(0.3,0.25,0);
    glTranslated(-2.5,0.24,0);
    apart6();
    glLoadIdentity();

    glScaled(0.35,0.4,0);
    glTranslated(-1.9,0.3,0);
    apart5();
    glLoadIdentity();

    glScaled(0.5,0.5,0);
    glTranslated(-1.13,0.5,0);
    apart2();
    glLoadIdentity();

    glScaled(0.5,0.5,0);
    glTranslated(-0.356,0.5,0);
    apart7();
    glLoadIdentity();

    glScaled(0.28,0.4,0);
    glTranslated(0.2,0.5,0);
    apart4();
    glLoadIdentity();

    glScaled(0.2,0.6,0);
    glTranslated(1.39,0.5,0);
    apart1();
    glLoadIdentity();

    glScaled(0.4,0.4,0);
    glTranslated(1.05,0.5,0);
    apart8();
    glLoadIdentity();

    glScaled(0.4,0.54,0);
    glTranslated(1.3,0.5,0);
    apart9();
    glLoadIdentity();

    glScaled(0.4,0.48,0);
    glTranslated(1.5,0.5,0);
    apart7();
    glLoadIdentity();

    glScaled(0.5,0.52,0);
    glTranslated(1.4,0.5,0);
    apart5();
    glLoadIdentity();

    glScaled(0.5,0.5,0);
    glTranslated(1.7,0.4,0);
    apart10();
    glLoadIdentity();

    glScaled(0.5,0.3,0);
    glTranslated(1.6,0.3,0);
    apart6();
    glLoadIdentity();
}



void animation_car1(int value)
{

    if(position_car1 > 1.0)
    {
        position_car1 = -1.0f;
    }

    position_car1 += speed_car1;

    glutPostRedisplay();


    glutTimerFunc(200, animation_car1, 0);
}



void display_car1()
{

    glPushMatrix();
    glTranslatef(position_car1,0,0);


    glScalef(0.2,0.2,0);
    glBegin(GL_QUADS); // bus body
    glColor3ub(249,216,216);
    glVertex2f(-0.2f,0.1f);
    glVertex2f(-0.2f,-0.1f);
    glVertex2f(0.25f,-0.1f);
    glVertex2f(0.2f,0.1f);

    glEnd();

    glBegin(GL_QUADS); // design
    glColor3ub(253,174,174);
    glVertex2f(-0.06f,0.1f);
    glVertex2f(0.0f,-0.1f);
    glVertex2f(0.08f,-0.1f);
    glVertex2f(0.02f,0.1f);

    glEnd();


    glColor3ub(0,0,0) ;
    int i_car;

    GLfloat x_car=.15f;
    GLfloat y_car=-0.1f;
    GLfloat radius_car =.05f;
    int triangleAmount_car = 20;

    GLfloat twicePi_car = 2.0f * PI;


    glBegin(GL_TRIANGLE_FAN); //wheel 1
    glVertex2f(x_car, y_car);
    for(i_car = 0; i_car <= triangleAmount_car; i_car++)
    {
        glVertex2f(
            x_car + (radius_car * cos(i_car *  twicePi_car / triangleAmount_car)),
            y_car + (radius_car * sin(i_car * twicePi_car / triangleAmount_car))
        );
    }
    glEnd();


    glTranslatef(-0.25,0.0,0.0);
    glColor3ub(0,0,0) ;
    int j_car;

    GLfloat x_car1=.15f;
    GLfloat y_car1=-0.1f;
    GLfloat radius_car1 =.05f;
    int triangleAmount_car1 = 20;

    GLfloat twicePi_car1 = 2.0f * PI;


    glBegin(GL_TRIANGLE_FAN); //wheel 2
    glVertex2f(x_car, y_car);
    for(j_car = 0; j_car <= triangleAmount_car1; j_car++)
    {
        glVertex2f(
            x_car1 + (radius_car1 * cos(j_car *  twicePi_car1 / triangleAmount_car1)),
            y_car1 + (radius_car1 * sin(j_car * twicePi_car1 / triangleAmount_car1))
        );
    }
    glEnd();

    glLoadIdentity();


    glPopMatrix();



    glPushMatrix();
    glTranslatef(position_car1,0,0);


    glScalef(0.2,0.2,0);
    glBegin(GL_QUADS); // mirror
    if(!isNight)
    {
           glColor3ub(64,224,208);
    }
    if(isNight)
    {
        glColor3ub(241, 201, 8);
    }
    glVertex2f(-0.195f,0.08f);
    glVertex2f(-0.195f,0.0f);
    glVertex2f(0.219f,0.0f);
    glVertex2f(0.2f,0.08f);

    glEnd();

    glBegin(GL_QUADS); // back light
    glColor3ub(255,69,0);
    glVertex2f(-0.2f,-0.03f);
    glVertex2f(-0.2f,-0.06f);
    glVertex2f(-0.18f,-0.06f);
    glVertex2f(-0.18f,-0.03f);

    glEnd();

    glBegin(GL_QUADS); // head light
    glColor3ub(255,69,0);
    glVertex2f(0.21f,-0.03f);
    glVertex2f(0.21f,-0.06f);
    glVertex2f(0.24f,-0.06f);
    glVertex2f(0.234f,-0.03f);

    glEnd();

    glLineWidth(1);
    glBegin(GL_LINES);// mirror outline 1
    glColor3ub(0,0,0);
    glVertex2f(-0.195f,0.08f);
    glVertex2f(-0.195f,0.0f);

    glEnd();

    glBegin(GL_LINES);// mirror outline 2
    glColor3ub(0,0,0);
    glVertex2f(-0.195f,0.0f);
    glVertex2f(0.219f,0.0f);

    glEnd();

    glBegin(GL_LINES);// mirror outline 3
    glColor3ub(0,0,0);
    glVertex2f(0.219f,0.0f);
    glVertex2f(0.2f,0.08f);

    glEnd();

    glBegin(GL_LINES);// mirror outline 4
    glColor3ub(0,0,0);
    glVertex2f(-0.195f,0.08f);
    glVertex2f(0.2f,0.08f);

    glEnd();

    glBegin(GL_LINES);// mirror border 1
    glColor3ub(0,0,0);
    glVertex2f(-0.04f,0.08f);
    glVertex2f(-0.04f,0.00f);

    glEnd();

    glBegin(GL_LINES);// mirror border 2
    glColor3ub(0,0,0);
    glVertex2f(0.1f,0.08f);
    glVertex2f(0.1f,0.00f);

    glEnd();



    glPushMatrix();
    glTranslatef(-0.1,-0.1,0.0);
    glRotatef(rotation_car1,0.0,0.0,-0.1); // wheel 1 rotation

    glScalef(0.2,0.2,0);
    glLineWidth(5);
    glBegin(GL_LINES);//wheel line
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.03f);

    glEnd();

    glPopMatrix();
    rotation_car1 += 0.1f;


    glPushMatrix();
    glTranslatef(0.15,-0.1,0.0);
    glRotatef(rotation_car1,0.0,0.0,-0.1); // wheel 2 rotation

    glScalef(0.2,0.2,0);
    glBegin(GL_LINES);//wheel line
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(249,216,216);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.03f);

    glEnd();

    glPopMatrix();
    rotation_car1 += 0.1f;




    glPopMatrix();

}



void animation_car2(int value)
{

    if(position_car2 < -1.0)
    {
        position_car2 = 1.0f;
    }

    position_car2 -= speed_car2;

    glutPostRedisplay();


    glutTimerFunc(200, animation_car2, 0);
}



void display_car2()
{

    glPushMatrix();
    glTranslatef(position_car2,0,0);


    glScalef(0.1,0.1,0);
    glBegin(GL_QUADS); // car upper body
    glColor3ub(101,92,92);
    glVertex2f(-0.1f,0.2f);
    glVertex2f(-0.2f,0.1f);
    glVertex2f(0.2f,0.1f);
    glVertex2f(0.1f,0.2f);

    glEnd();

    glBegin(GL_QUADS); // car lower body
    glColor3ub(101,92,92);
    glVertex2f(-0.4f,0.1f);
    glVertex2f(-0.45f,-0.1f);
    glVertex2f(0.3f,-0.1f);
    glVertex2f(0.3f,0.1f);

    glEnd();


    glBegin(GL_QUADS); // car design
    glColor3ub(54,51,51);
    glVertex2f(-0.414f,0.05f);
    glVertex2f(-0.438f,-0.05f);
    glVertex2f(0.3f,-0.05f);
    glVertex2f(0.3f,0.05f);

    glEnd();



    glColor3ub(0,0,0) ;
    int i_car3;

    GLfloat x_car3=.15f;
    GLfloat y_car3=-0.1f;
    GLfloat radius_car3 =.06f;
    int triangleAmount_car3 = 20;

    GLfloat twicePi_car3 = 2.0f * PI;


    glBegin(GL_TRIANGLE_FAN); //wheel 1
    glVertex2f(x_car3, y_car3);
    for(i_car3 = 0; i_car3 <= triangleAmount_car3; i_car3++)
    {
        glVertex2f(
            x_car3 + (radius_car3 * cos(i_car3 *  twicePi_car3 / triangleAmount_car3)),
            y_car3 + (radius_car3 * sin(i_car3 * twicePi_car3 / triangleAmount_car3))
        );
    }
    glEnd();


    glTranslatef(-0.4,0.0,0.0);
    glColor3ub(0,0,0) ;
    int j_car4;

    GLfloat x_car4=.15f;
    GLfloat y_car4=-0.1f;
    GLfloat radius_car4 =.06f;
    int triangleAmount_car4 = 20;

    GLfloat twicePi_car4 = 2.0f * PI;


    glBegin(GL_TRIANGLE_FAN); //wheel 2
    glVertex2f(x_car4, y_car4);
    for(j_car4 = 0; j_car4 <= triangleAmount_car4; j_car4++)
    {
        glVertex2f(
            x_car4 + (radius_car4 * cos(j_car4 *  twicePi_car4 / triangleAmount_car4)),
            y_car4 + (radius_car4 * sin(j_car4 * twicePi_car4 / triangleAmount_car4))
        );
    }
    glEnd();

    glLoadIdentity();


    glPopMatrix();

    glPushMatrix();
    glTranslatef(position_car2,0,0);


    glScalef(0.1,0.1,0);
    glBegin(GL_QUADS); // car mirror
    if(!isNight)
    {
        glColor3ub(64,224,208);
        glVertex2f(-0.095f,0.19f);
        glVertex2f(-0.185f,0.1f);
        glVertex2f(0.185f,0.1f);
        glVertex2f(0.095f,0.19f);
    }
    if(isNight)
    {
        glColor3ub(250, 237, 172);
        glVertex2f(-0.095f,0.19f);
        glVertex2f(-0.185f,0.1f);
        glVertex2f(0.185f,0.1f);
        glVertex2f(0.095f,0.19f);
    }

    glEnd();

    glBegin(GL_LINES); // mirror line
    glColor3ub(0,0,0);
    glVertex2f(0.01f,0.19f);
    glVertex2f(0.0f,0.1f);

    glEnd();


    glBegin(GL_QUADS); // car headlight
    glColor3ub(255,99,71);
    glVertex2f(-0.423f,0.015f);
    glVertex2f(-0.431f,-0.015f);
    glVertex2f(-0.39f,-0.015f);
    glVertex2f(-0.39f,0.015f);

    glEnd();

    glBegin(GL_QUADS); // car back light
    glColor3ub(255,99,71);
    glVertex2f(0.285f,0.015f);
    glVertex2f(0.285f,-0.015f);
    glVertex2f(0.3f,-0.015f);
    glVertex2f(0.3f,0.015f);

    glEnd();


    glPushMatrix();
    glTranslatef(-0.25,-0.1,0.0);
    glRotatef(rotation_car1,0.0,0.0,0.1); // wheel 1 rotation

    glScalef(0.1,0.1,0);
    glLineWidth(5);
    glBegin(GL_LINES);//wheel line vertical
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line vertical
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line horizontal
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line horizontal
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.03f);

    glEnd();

    glPopMatrix();
    rotation_car1 += 0.1f;


    glPushMatrix();
    glTranslatef(0.15,-0.1,0.0);
    glRotatef(rotation_car1,0.0,0.0,0.1); // wheel 2 rotation

    glScalef(0.1,0.1,0);
    glBegin(GL_LINES);//wheel line
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(101,92,92);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.03f);

    glEnd();

    glPopMatrix();
    rotation_car1 += 0.1f;


    glPopMatrix();
}



void animation_car3(int value)
{

    if(position_car3 > 1.0)
    {
        position_car3 = -1.0f;
    }

    position_car3 += speed_car3;

    glutPostRedisplay();


    glutTimerFunc(300, animation_car3, 0);
}



void display_car3()
{

    glPushMatrix();
    glTranslatef(position_car3,0,0);


    glScalef(-0.1,0.1,0);
    glBegin(GL_QUADS); // car upper body
    glColor3ub(166,1,1);
    glVertex2f(-0.1f,0.2f);
    glVertex2f(-0.2f,0.1f);
    glVertex2f(0.2f,0.1f);
    glVertex2f(0.1f,0.2f);

    glEnd();

    glBegin(GL_QUADS); // car lower body
    glColor3ub(166,1,1);
    glVertex2f(-0.4f,0.1f);
    glVertex2f(-0.45f,-0.1f);
    glVertex2f(0.3f,-0.1f);
    glVertex2f(0.3f,0.1f);

    glEnd();



    glColor3ub(0,0,0) ;
    int i_car5;

    GLfloat x_car5=.15f;
    GLfloat y_car5=-0.1f;
    GLfloat radius_car5 =.06f;
    int triangleAmount_car5 = 20;

    GLfloat twicePi_car5 = 2.0f * PI;


    glBegin(GL_TRIANGLE_FAN); //wheel 1
    glVertex2f(x_car5, y_car5);
    for(i_car5 = 0; i_car5 <= triangleAmount_car5; i_car5++)
    {
        glVertex2f(
            x_car5 + (radius_car5 * cos(i_car5 *  twicePi_car5 / triangleAmount_car5)),
            y_car5 + (radius_car5 * sin(i_car5 * twicePi_car5 / triangleAmount_car5))
        );
    }
    glEnd();


    glTranslatef(-0.4,0.0,0.0);
    glColor3ub(0,0,0) ;
    int j_car6;

    GLfloat x_car6=.15f;
    GLfloat y_car6=-0.1f;
    GLfloat radius_car6 =.06f;
    int triangleAmount_car6 = 20;

    GLfloat twicePi_car6 = 2.0f * PI;


    glBegin(GL_TRIANGLE_FAN); //wheel 2
    glVertex2f(x_car6, y_car6);
    for(j_car6 = 0; j_car6 <= triangleAmount_car6; j_car6++)
    {
        glVertex2f(
            x_car6 + (radius_car6 * cos(j_car6 *  twicePi_car6 / triangleAmount_car6)),
            y_car6 + (radius_car6 * sin(j_car6 * twicePi_car6 / triangleAmount_car6))
        );
    }
    glEnd();

    glLoadIdentity();


    glPopMatrix();

    glPushMatrix();
    glTranslatef(position_car3,0,0);


    glScalef(-0.1,0.1,0);
    glBegin(GL_QUADS); // car mirror
    glColor3ub(64,224,208);
    glVertex2f(-0.095f,0.19f);
    glVertex2f(-0.185f,0.1f);
    glVertex2f(0.185f,0.1f);
    glVertex2f(0.095f,0.19f);

    glEnd();

    glBegin(GL_LINES); // mirror line
    glColor3ub(0,0,0);
    glVertex2f(0.01f,0.19f);
    glVertex2f(0.0f,0.1f);

    glEnd();


    glBegin(GL_QUADS); // car headlight
    glColor3ub(255,99,71);
    glVertex2f(-0.423f,0.015f);
    glVertex2f(-0.431f,-0.015f);
    glVertex2f(-0.39f,-0.015f);
    glVertex2f(-0.39f,0.015f);

    glEnd();

    glBegin(GL_QUADS); // car back light
    glColor3ub(255,99,71);
    glVertex2f(0.285f,0.015f);
    glVertex2f(0.285f,-0.015f);
    glVertex2f(0.3f,-0.015f);
    glVertex2f(0.3f,0.015f);

    glEnd();


    glPushMatrix();
    glTranslatef(-0.25,-0.1,0.0);
    glRotatef(rotation_car3,0.0,0.0,0.1); // wheel 1 rotation

    glScalef(-0.1,0.1,0);
    glLineWidth(5);
    glBegin(GL_LINES);//wheel line vertical
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line vertical
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line horizontal
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line horizontal
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.03f);

    glEnd();

    glPopMatrix();
    rotation_car3 += 0.1f;


    glPushMatrix();
    glTranslatef(0.15,-0.1,0.0);
    glRotatef(rotation_car3,0.0,0.0,0.1); // wheel 2 rotation

    glScalef(-0.1,0.1,0);
    glBegin(GL_LINES);//wheel line
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.03f);

    glEnd();

    glPopMatrix();
    rotation_car3 += 0.1f;


    glPopMatrix();

}



void animation_car4(int value)
{

    if(position_car4 < -1.0)
    {
        position_car4 = 1.0f;
    }

    position_car4 -= speed_car4;

    glutPostRedisplay();


    glutTimerFunc(400, animation_car4, 0);
}



void display_car4()
{


    glPushMatrix();
    glTranslatef(position_car4,0,0);


    glScalef(-0.2,0.2,0);
    glBegin(GL_QUADS); // bus body
    glColor3ub(175,161,161);
    glVertex2f(-0.2f,0.1f);
    glVertex2f(-0.2f,-0.1f);
    glVertex2f(0.25f,-0.1f);
    glVertex2f(0.2f,0.1f);

    glEnd();


    glColor3ub(0,0,0) ;
    int i_car;

    GLfloat x_car=.15f;
    GLfloat y_car=-0.1f;
    GLfloat radius_car =.05f;
    int triangleAmount_car = 20;

    GLfloat twicePi_car = 2.0f * PI;


    glBegin(GL_TRIANGLE_FAN); //wheel 1
    glVertex2f(x_car, y_car);
    for(i_car = 0; i_car <= triangleAmount_car; i_car++)
    {
        glVertex2f(
            x_car + (radius_car * cos(i_car *  twicePi_car / triangleAmount_car)),
            y_car + (radius_car * sin(i_car * twicePi_car / triangleAmount_car))
        );
    }
    glEnd();


    glTranslatef(-0.25,0.0,0.0);
    glColor3ub(0,0,0) ;
    int j_car;

    GLfloat x_car1=.15f;
    GLfloat y_car1=-0.1f;
    GLfloat radius_car1 =.05f;
    int triangleAmount_car1 = 20;

    GLfloat twicePi_car1 = 2.0f * PI;


    glBegin(GL_TRIANGLE_FAN); //wheel 2
    glVertex2f(x_car, y_car);
    for(j_car = 0; j_car <= triangleAmount_car1; j_car++)
    {
        glVertex2f(
            x_car1 + (radius_car1 * cos(j_car *  twicePi_car1 / triangleAmount_car1)),
            y_car1 + (radius_car1 * sin(j_car * twicePi_car1 / triangleAmount_car1))
        );
    }
    glEnd();

    glLoadIdentity();


    glPopMatrix();



    glPushMatrix();
    glTranslatef(position_car4,0,0);


    glScalef(-0.2,0.2,0);
    glBegin(GL_QUADS); // mirror
    glColor3ub(64,224,208);
    glVertex2f(-0.195f,0.08f);
    glVertex2f(-0.195f,0.0f);
    glVertex2f(0.219f,0.0f);
    glVertex2f(0.2f,0.08f);

    glEnd();

    glBegin(GL_QUADS); // back light
    glColor3ub(255,69,0);
    glVertex2f(-0.2f,-0.03f);
    glVertex2f(-0.2f,-0.06f);
    glVertex2f(-0.18f,-0.06f);
    glVertex2f(-0.18f,-0.03f);

    glEnd();

    glBegin(GL_QUADS); // head light
    glColor3ub(255,69,0);
    glVertex2f(0.21f,-0.03f);
    glVertex2f(0.21f,-0.06f);
    glVertex2f(0.24f,-0.06f);
    glVertex2f(0.234f,-0.03f);

    glEnd();

    glLineWidth(1);
    glBegin(GL_LINES);// mirror outline 1
    glColor3ub(0,0,0);
    glVertex2f(-0.195f,0.08f);
    glVertex2f(-0.195f,0.0f);

    glEnd();

    glBegin(GL_LINES);// mirror outline 2
    glColor3ub(0,0,0);
    glVertex2f(-0.195f,0.0f);
    glVertex2f(0.219f,0.0f);

    glEnd();

    glBegin(GL_LINES);// mirror outline 3
    glColor3ub(0,0,0);
    glVertex2f(0.219f,0.0f);
    glVertex2f(0.2f,0.08f);

    glEnd();

    glBegin(GL_LINES);// mirror outline 4
    glColor3ub(0,0,0);
    glVertex2f(-0.195f,0.08f);
    glVertex2f(0.2f,0.08f);

    glEnd();

    glBegin(GL_LINES);// mirror border 1
    glColor3ub(0,0,0);
    glVertex2f(-0.04f,0.08f);
    glVertex2f(-0.04f,0.00f);

    glEnd();

    glBegin(GL_LINES);// mirror border 2
    glColor3ub(0,0,0);
    glVertex2f(0.1f,0.08f);
    glVertex2f(0.1f,0.00f);

    glEnd();



    glPushMatrix();
    glTranslatef(-0.1,-0.1,0.0);
    glRotatef(rotation_car4,0.0,0.0,-0.1); // wheel 1 rotation

    glScalef(-0.2,0.2,0);
    glLineWidth(5);
    glBegin(GL_LINES);//wheel line
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.03f);

    glEnd();

    glPopMatrix();
    rotation_car4 += 0.1f;


    glPushMatrix();
    glTranslatef(0.15,-0.1,0.0);
    glRotatef(rotation_car4,0.0,0.0,-0.1); // wheel 2 rotation

    glScalef(-0.2,0.2,0);
    glBegin(GL_LINES);//wheel line
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(222,211,211);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.03f);

    glEnd();

    glPopMatrix();
    rotation_car4 += 0.1f;


    glPopMatrix();
}



void animation_car5(int value)
{

    if(position_car5 > 1.0)
    {
        position_car5 = -1.0f;
    }

    position_car5 += speed_car5;

    glutPostRedisplay();


    glutTimerFunc(100, animation_car5, 0);
}



void display_car5()
{

    glPushMatrix();
    glTranslatef(position_car5,0,0);


    glScalef(-0.1,0.1,0);
    glBegin(GL_QUADS); // car upper body
    glColor3ub(71,85,141);
    glVertex2f(-0.1f,0.2f);
    glVertex2f(-0.2f,0.1f);
    glVertex2f(0.2f,0.1f);
    glVertex2f(0.1f,0.2f);

    glEnd();

    glBegin(GL_QUADS); // car lower body
    glColor3ub(71,85,141);
    glVertex2f(-0.4f,0.1f);
    glVertex2f(-0.45f,-0.1f);
    glVertex2f(0.3f,-0.1f);
    glVertex2f(0.3f,0.1f);

    glEnd();


    glBegin(GL_QUADS); // car design
    glColor3ub(17,38,145);
    glVertex2f(-0.414f,0.05f);
    glVertex2f(-0.438f,-0.05f);
    glVertex2f(0.3f,-0.05f);
    glVertex2f(0.3f,0.05f);

    glEnd();



    glColor3ub(0,0,0) ;
    int i_car5;

    GLfloat x_car5=.15f;
    GLfloat y_car5=-0.1f;
    GLfloat radius_car5 =.06f;
    int triangleAmount_car5 = 20;

    GLfloat twicePi_car5 = 2.0f * PI;


    glBegin(GL_TRIANGLE_FAN); //wheel 1
    glVertex2f(x_car5, y_car5);
    for(i_car5 = 0; i_car5 <= triangleAmount_car5; i_car5++)
    {
        glVertex2f(
            x_car5 + (radius_car5 * cos(i_car5 *  twicePi_car5 / triangleAmount_car5)),
            y_car5 + (radius_car5 * sin(i_car5 * twicePi_car5 / triangleAmount_car5))
        );
    }
    glEnd();


    glTranslatef(-0.4,0.0,0.0);
    glColor3ub(0,0,0) ;
    int j_car6;

    GLfloat x_car6=.15f;
    GLfloat y_car6=-0.1f;
    GLfloat radius_car6 =.06f;
    int triangleAmount_car6 = 20;

    GLfloat twicePi_car6 = 2.0f * PI;


    glBegin(GL_TRIANGLE_FAN); //wheel 2
    glVertex2f(x_car6, y_car6);
    for(j_car6 = 0; j_car6 <= triangleAmount_car6; j_car6++)
    {
        glVertex2f(
            x_car6 + (radius_car6 * cos(j_car6 *  twicePi_car6 / triangleAmount_car6)),
            y_car6 + (radius_car6 * sin(j_car6 * twicePi_car6 / triangleAmount_car6))
        );
    }
    glEnd();

    glLoadIdentity();


    glPopMatrix();

    glPushMatrix();
    glTranslatef(position_car5,0,0);


    glScalef(-0.1,0.1,0);
    glBegin(GL_QUADS); // car mirror
    glColor3ub(64,224,208);
    glVertex2f(-0.095f,0.19f);
    glVertex2f(-0.185f,0.1f);
    glVertex2f(0.185f,0.1f);
    glVertex2f(0.095f,0.19f);

    glEnd();

    glBegin(GL_LINES); // mirror line
    glColor3ub(0,0,0);
    glVertex2f(0.01f,0.19f);
    glVertex2f(0.0f,0.1f);

    glEnd();


    glBegin(GL_QUADS); // car headlight
    glColor3ub(255,99,71);
    glVertex2f(-0.423f,0.015f);
    glVertex2f(-0.431f,-0.015f);
    glVertex2f(-0.39f,-0.015f);
    glVertex2f(-0.39f,0.015f);

    glEnd();

    glBegin(GL_QUADS); // car back light
    glColor3ub(255,99,71);
    glVertex2f(0.285f,0.015f);
    glVertex2f(0.285f,-0.015f);
    glVertex2f(0.3f,-0.015f);
    glVertex2f(0.3f,0.015f);

    glEnd();


    glPushMatrix();
    glTranslatef(-0.25,-0.1,0.0);
    glRotatef(rotation_car5,0.0,0.0,0.1); // wheel 1 rotation

    glScalef(-0.1,0.1,0);
    glLineWidth(5);
    glBegin(GL_LINES);//wheel line vertical
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line vertical
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line horizontal
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line horizontal
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.03f);

    glEnd();

    glPopMatrix();
    rotation_car5 += 0.1f;


    glPushMatrix();
    glTranslatef(0.15,-0.1,0.0);
    glRotatef(rotation_car5,0.0,0.0,0.1); // wheel 2 rotation

    glScalef(-0.1,0.1,0);
    glBegin(GL_LINES);//wheel line
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.0f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.0f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(-0.03f,-0.03f);

    glEnd();

    glBegin(GL_LINES);//wheel line slanted
    glColor3ub(166,1,1);
    glVertex2f(0.0f,0.0f);
    glVertex2f(0.03f,0.03f);

    glEnd();

    glPopMatrix();
    rotation_car5 += 0.1f;


    glPopMatrix();
}



void star()
{


    glTranslatef(0.0,0.8,0.0);                              // star 1

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();


    glTranslatef(0.37,0.8,0.0);                              // star 2

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(0.65,0.7,0.0);                      // star 3

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(0.73,0.9,0.0);                          // star 4

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(0.3,0.76,0.0);                          // star 6

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(0.81,0.78,0.0);                          // star 7

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(0.57,0.84,0.0);                              // star 8

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(0.4,0.9,0.0);                              // star 8

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(0.7,0.83,0.0);                              // star 9

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(0.1,0.72,0.0);                              // star 10

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(-0.4,0.7,0.0);                              // star 11

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(-0.75,0.75,0.0);                              // star 12

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(-0.1,0.89,0.0);                              // star 13

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(-0.6,0.84,0.0);                              // star 14

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(-0.2,0.78,0.0);                              // star 15

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(-0.2,0.73,0.0);                              // star 16

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(-0.1,0.81,0.0);                              // star 17

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(-0.63,0.77,0.0);                              // star 18

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(-0.8,0.7,0.0);                              // star 19

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(-0.4,0.7,0.0);                              // star 20

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(-0.8,0.84,0.0);                              // star 21

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();

    glTranslatef(0.2,0.88,0.0);                              // star 22

    glScalef(0.1,0.1,0.0);
    glBegin(GL_POLYGON); // start middle part
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 1
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(0.03f,0.0f);
    glVertex2f(0.0f,0.07f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 2
    glColor3ub(255,255,255);
    glVertex2f(-0.03f,0.0f);
    glVertex2f(-0.1f,0.0f);
    glVertex2f(-0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 3
    glColor3ub(255,255,255);
    glVertex2f(-0.04f,-0.05f);
    glVertex2f(-0.07f,-0.14f);
    glVertex2f(0.0f,-0.09f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 4
    glColor3ub(255,255,255);
    glVertex2f(0.0f,-0.09f);
    glVertex2f(0.07f,-0.14f);
    glVertex2f(0.04f,-0.05f);

    glEnd();

    glBegin(GL_TRIANGLES); // star triangle 5
    glColor3ub(255,255,255);
    glVertex2f(0.04f,-0.05f);
    glVertex2f(0.1f,0.0f);
    glVertex2f(0.03f,0.0f);

    glEnd();

    glLoadIdentity();


    glLoadIdentity();
}



void Thunder1()
{

	glLineWidth(5);
	glBegin(GL_LINES); //thunder 1, root 1
	glColor3ub(65,101,171);
	glVertex2f(0.3f,0.99f);
	glVertex2f(0.29f,0.98f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); //thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(0.29f,0.98f);
	glVertex2f(0.285f,0.975f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); //thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(0.285f,0.975f);
	glVertex2f(0.28f,0.97f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); //thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(0.28f,0.97f);
	glVertex2f(0.22f,0.95f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES);  // thunder 1 , root 1 , junction 1
	glColor3ub(65,101,171);
	glVertex2f(0.22f,0.95f);
	glVertex2f(0.24f,0.93f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(0.24f,0.93f);
	glVertex2f(0.21f,0.91f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(0.21f,0.91f);
	glVertex2f(0.15f,0.88f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(0.15f,0.88f);
	glVertex2f(0.155f,0.82f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(0.155f,0.82f);
	glVertex2f(0.12f,0.81f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(0.155f,0.82f);
	glVertex2f(0.16f,0.77f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 2
	glColor3ub(65,101,171);
	glVertex2f(0.24f,0.93f);
	glVertex2f(0.25f,0.92f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 2
	glColor3ub(65,101,171);
	glVertex2f(0.25f,0.92f);
	glVertex2f(0.25f,0.86f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 2 , junction 2
	glColor3ub(65,101,171);
	glVertex2f(0.25f,0.86f);
	glVertex2f(0.3f,0.83f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(65,101,171);
	glVertex2f(0.3f,0.83f);
	glVertex2f(0.29f,0.82f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(65,101,171);
	glVertex2f(0.29f,0.82f);
	glVertex2f(0.31f,0.81f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(65,101,171);
	glVertex2f(0.31f,0.81f);
	glVertex2f(0.3f,0.78f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(65,101,171);
	glVertex2f(0.3f,0.78f);
	glVertex2f(0.315f,0.76f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 3 , junction 3
	glColor3ub(65,101,171);
	glVertex2f(0.315f,0.76f);
	glVertex2f(0.29f,0.71f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 4
	glColor3ub(65,101,171);
	glVertex2f(0.29f,0.71f);
	glVertex2f(0.26f,0.7f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 4
	glColor3ub(65,101,171);
	glVertex2f(0.26f,0.7f);
	glVertex2f(0.25f,0.67f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.29f,0.71f);
	glVertex2f(0.31f,0.68f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.31f,0.68f);
	glVertex2f(0.315f,0.675f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.315f,0.675f);
	glVertex2f(0.305f,0.67f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.305f,0.67f);
	glVertex2f(0.32f,0.65f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.32f,0.65f);
	glVertex2f(0.29f,0.63f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.29f,0.63f);
	glVertex2f(0.285f,0.6f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(65,101,171);
	glVertex2f(0.24f,0.93f);
	glVertex2f(0.28f,0.94f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(65,101,171);
	glVertex2f(0.28f,0.94f);
	glVertex2f(0.33f,0.925f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(65,101,171);
	glVertex2f(0.33f,0.925f);
	glVertex2f(0.35f,0.9f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 6 , junction 4
	glColor3ub(65,101,171);
	glVertex2f(0.35f,0.9f);
	glVertex2f(0.39f,0.885f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 7
	glColor3ub(65,101,171);
	glVertex2f(0.39f,0.885f);
	glVertex2f(0.37f,0.84f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(65,101,171);
	glVertex2f(0.39f,0.885f);
	glVertex2f(0.42f,0.87f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(65,101,171);
	glVertex2f(0.42f,0.87f);
	glVertex2f(0.425f,0.81f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(65,101,171);
	glVertex2f(0.425f,0.81f);
	glVertex2f(0.435f,0.8f);

	glEnd();



	glLineWidth(2);
	glBegin(GL_LINES); //thunder 1, root 1
	glColor3ub(255,255,255);
	glVertex2f(0.3f,0.99f);
	glVertex2f(0.29f,0.98f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); //thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(0.29f,0.98f);
	glVertex2f(0.285f,0.975f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); //thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(0.285f,0.975f);
	glVertex2f(0.28f,0.97f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); //thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(0.28f,0.97f);
	glVertex2f(0.22f,0.95f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES);  // thunder 1 , root 1 , junction 1
	glColor3ub(255,255,255);
	glVertex2f(0.22f,0.95f);
	glVertex2f(0.24f,0.93f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(0.24f,0.93f);
	glVertex2f(0.21f,0.91f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(0.21f,0.91f);
	glVertex2f(0.15f,0.88f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(0.15f,0.88f);
	glVertex2f(0.155f,0.82f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(0.155f,0.82f);
	glVertex2f(0.12f,0.81f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(0.155f,0.82f);
	glVertex2f(0.16f,0.77f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 2
	glColor3ub(255,255,255);
	glVertex2f(0.24f,0.93f);
	glVertex2f(0.25f,0.92f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 2
	glColor3ub(255,255,255);
	glVertex2f(0.25f,0.92f);
	glVertex2f(0.25f,0.86f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 2 , junction 2
	glColor3ub(255,255,255);
	glVertex2f(0.25f,0.86f);
	glVertex2f(0.3f,0.83f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(255,255,255);
	glVertex2f(0.3f,0.83f);
	glVertex2f(0.29f,0.82f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(255,255,255);
	glVertex2f(0.29f,0.82f);
	glVertex2f(0.31f,0.81f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(255,255,255);
	glVertex2f(0.31f,0.81f);
	glVertex2f(0.3f,0.78f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(255,255,255);
	glVertex2f(0.3f,0.78f);
	glVertex2f(0.315f,0.76f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 3 , junction 3
	glColor3ub(255,255,255);
	glVertex2f(0.315f,0.76f);
	glVertex2f(0.29f,0.71f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 4
	glColor3ub(255,255,255);
	glVertex2f(0.29f,0.71f);
	glVertex2f(0.26f,0.7f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 4
	glColor3ub(255,255,255);
	glVertex2f(0.26f,0.7f);
	glVertex2f(0.25f,0.67f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.29f,0.71f);
	glVertex2f(0.31f,0.68f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.31f,0.68f);
	glVertex2f(0.315f,0.675f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.315f,0.675f);
	glVertex2f(0.305f,0.67f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.305f,0.67f);
	glVertex2f(0.32f,0.65f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.32f,0.65f);
	glVertex2f(0.29f,0.63f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.29f,0.63f);
	glVertex2f(0.285f,0.6f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(255,255,255);
	glVertex2f(0.24f,0.93f);
	glVertex2f(0.28f,0.94f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(255,255,255);
	glVertex2f(0.28f,0.94f);
	glVertex2f(0.33f,0.925f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(255,255,255);
	glVertex2f(0.33f,0.925f);
	glVertex2f(0.35f,0.9f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 6 , junction 4
	glColor3ub(255,255,255);
	glVertex2f(0.35f,0.9f);
	glVertex2f(0.39f,0.885f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 7
	glColor3ub(255,255,255);
	glVertex2f(0.39f,0.885f);
	glVertex2f(0.37f,0.84f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(255,255,255);
	glVertex2f(0.39f,0.885f);
	glVertex2f(0.42f,0.87f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(255,255,255);
	glVertex2f(0.42f,0.87f);
	glVertex2f(0.425f,0.81f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(255,255,255);
	glVertex2f(0.425f,0.81f);
	glVertex2f(0.435f,0.8f);

	glEnd();



}



void Thunder2()
{

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(-1.0f,1.0f);
	glVertex2f(-0.98f,0.97f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(-0.98f,0.97f);
	glVertex2f(-0.97f,0.94f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(-0.97f,0.94f);
	glVertex2f(-0.94f,0.92f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(-0.94f,0.92f);
	glVertex2f(-0.945f,0.93f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(-0.945f,0.93f);
	glVertex2f(-0.95f,0.915f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(-0.95f,0.915f);
	glVertex2f(-0.92f,0.905f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(-0.92f,0.905);
	glVertex2f(-0.91f,0.88f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(65,101,171);
	glVertex2f(-0.91f,0.88f);
	glVertex2f(-0.89f,0.89f);

	glEnd();


	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(-1.0f,1.0f);
	glVertex2f(-0.98f,0.97f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(-0.98f,0.97f);
	glVertex2f(-0.97f,0.94f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(-0.97f,0.94f);
	glVertex2f(-0.94f,0.92f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(-0.94f,0.92f);
	glVertex2f(-0.945f,0.93f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(-0.945f,0.93f);
	glVertex2f(-0.95f,0.915f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(-0.95f,0.915f);
	glVertex2f(-0.92f,0.905f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(-0.92f,0.905);
	glVertex2f(-0.91f,0.88f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 1
	glColor3ub(255,255,255);
	glVertex2f(-0.91f,0.88f);
	glVertex2f(-0.89f,0.89f);

	glEnd();


    glTranslatef(-1.13,-0.04,0.0);
	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 2
	glColor3ub(65,101,171);
	glVertex2f(0.24f,0.93f);
	glVertex2f(0.25f,0.92f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 2
	glColor3ub(65,101,171);
	glVertex2f(0.25f,0.92f);
	glVertex2f(0.25f,0.86f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 2 , junction 2
	glColor3ub(65,101,171);
	glVertex2f(0.25f,0.86f);
	glVertex2f(0.3f,0.83f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(65,101,171);
	glVertex2f(0.3f,0.83f);
	glVertex2f(0.29f,0.82f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(65,101,171);
	glVertex2f(0.29f,0.82f);
	glVertex2f(0.31f,0.81f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(65,101,171);
	glVertex2f(0.31f,0.81f);
	glVertex2f(0.3f,0.78f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(65,101,171);
	glVertex2f(0.3f,0.78f);
	glVertex2f(0.315f,0.76f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 3 , junction 3
	glColor3ub(65,101,171);
	glVertex2f(0.315f,0.76f);
	glVertex2f(0.29f,0.71f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 4
	glColor3ub(65,101,171);
	glVertex2f(0.29f,0.71f);
	glVertex2f(0.26f,0.7f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 4
	glColor3ub(65,101,171);
	glVertex2f(0.26f,0.7f);
	glVertex2f(0.25f,0.67f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.29f,0.71f);
	glVertex2f(0.31f,0.68f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.31f,0.68f);
	glVertex2f(0.315f,0.675f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.315f,0.675f);
	glVertex2f(0.305f,0.67f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.305f,0.67f);
	glVertex2f(0.32f,0.65f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.32f,0.65f);
	glVertex2f(0.29f,0.63f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(65,101,171);
	glVertex2f(0.29f,0.63f);
	glVertex2f(0.285f,0.6f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(65,101,171);
	glVertex2f(0.24f,0.93f);
	glVertex2f(0.28f,0.94f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(65,101,171);
	glVertex2f(0.28f,0.94f);
	glVertex2f(0.33f,0.925f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(65,101,171);
	glVertex2f(0.33f,0.925f);
	glVertex2f(0.35f,0.9f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 6 , junction 4
	glColor3ub(65,101,171);
	glVertex2f(0.35f,0.9f);
	glVertex2f(0.39f,0.885f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 7
	glColor3ub(65,101,171);
	glVertex2f(0.39f,0.885f);
	glVertex2f(0.37f,0.84f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(65,101,171);
	glVertex2f(0.39f,0.885f);
	glVertex2f(0.42f,0.87f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(65,101,171);
	glVertex2f(0.42f,0.87f);
	glVertex2f(0.425f,0.81f);

	glEnd();

	glLineWidth(5);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(65,101,171);
	glVertex2f(0.425f,0.81f);
	glVertex2f(0.435f,0.8f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 2
	glColor3ub(255,255,255);
	glVertex2f(0.24f,0.93f);
	glVertex2f(0.25f,0.92f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 2
	glColor3ub(255,255,255);
	glVertex2f(0.25f,0.92f);
	glVertex2f(0.25f,0.86f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 2 , junction 2
	glColor3ub(255,255,255);
	glVertex2f(0.25f,0.86f);
	glVertex2f(0.3f,0.83f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(255,255,255);
	glVertex2f(0.3f,0.83f);
	glVertex2f(0.29f,0.82f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(255,255,255);
	glVertex2f(0.29f,0.82f);
	glVertex2f(0.31f,0.81f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(255,255,255);
	glVertex2f(0.31f,0.81f);
	glVertex2f(0.3f,0.78f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 3
	glColor3ub(255,255,255);
	glVertex2f(0.3f,0.78f);
	glVertex2f(0.315f,0.76f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 3 , junction 3
	glColor3ub(255,255,255);
	glVertex2f(0.315f,0.76f);
	glVertex2f(0.29f,0.71f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 4
	glColor3ub(255,255,255);
	glVertex2f(0.29f,0.71f);
	glVertex2f(0.26f,0.7f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 4
	glColor3ub(255,255,255);
	glVertex2f(0.26f,0.7f);
	glVertex2f(0.25f,0.67f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.29f,0.71f);
	glVertex2f(0.31f,0.68f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.31f,0.68f);
	glVertex2f(0.315f,0.675f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.315f,0.675f);
	glVertex2f(0.305f,0.67f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.305f,0.67f);
	glVertex2f(0.32f,0.65f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.32f,0.65f);
	glVertex2f(0.29f,0.63f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 5
	glColor3ub(255,255,255);
	glVertex2f(0.29f,0.63f);
	glVertex2f(0.285f,0.6f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(255,255,255);
	glVertex2f(0.24f,0.93f);
	glVertex2f(0.28f,0.94f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(255,255,255);
	glVertex2f(0.28f,0.94f);
	glVertex2f(0.33f,0.925f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 6
	glColor3ub(255,255,255);
	glVertex2f(0.33f,0.925f);
	glVertex2f(0.35f,0.9f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 6 , junction 4
	glColor3ub(255,255,255);
	glVertex2f(0.35f,0.9f);
	glVertex2f(0.39f,0.885f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 7
	glColor3ub(255,255,255);
	glVertex2f(0.39f,0.885f);
	glVertex2f(0.37f,0.84f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(255,255,255);
	glVertex2f(0.39f,0.885f);
	glVertex2f(0.42f,0.87f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(255,255,255);
	glVertex2f(0.42f,0.87f);
	glVertex2f(0.425f,0.81f);

	glEnd();

	glLineWidth(2);
	glBegin(GL_LINES); // thunder 1 , root 8
	glColor3ub(255,255,255);
	glVertex2f(0.425f,0.81f);
	glVertex2f(0.435f,0.8f);

	glEnd();

	glLoadIdentity();


}



void RainAnimation(int value)
{

    if(RainPos <0.6)
        RainPos = 1;

    RainPos -= 0.1;

    glutPostRedisplay();


    glutTimerFunc(50, RainAnimation, 0);
}



void Rain(GLfloat a, GLfloat b)
{
	glLineWidth(0.5);
	glBegin(GL_LINES);
	glColor3ub(255,255,255);
	glVertex2f(a,b);
	glVertex2f(a-0.01,b-0.05);

	glEnd();
}



void RainFall()
{
    float Y = 2.0;

    for(int i=0; i<30; i++)
    {
        float X = -3;

        for(int j=0; j<45; j++)
        {
            X += 0.2 ;

            Rain(X , Y);

        }
        Y -=0.2;

    }
}



void MonsoonRiver()
{
    glBegin(GL_QUADS);
    glColor3ub(22,108,155);
    glVertex2f(-1.0f,-0.27f);
    glVertex2f(-1.0f,-1.0f);
    glVertex2f(1.0f,-1.0f);
    glVertex2f(1.0f,-0.27f);
    glEnd();
}



void MonsoonSky()
{
    glBegin(GL_QUADS);
    glColor3ub(0,61,108);
    glVertex2f(-1.0f,1.0f);
    glVertex2f(-1.0f,-0.15f);
    glColor3ub(109, 116, 130);
    glVertex2f(1.0f,-0.15f);
    glVertex2f(1.0f,1.0f);
    glEnd();
}



void animation_ship1(int value)
{

    if(position_ship1 > 4.0)
    {
        position_ship1 = -4.0f;
    }

    position_ship1 += speed_ship1;

    glutPostRedisplay();


    glutTimerFunc(200, animation_ship1, 0);
}



void Smoke(GLfloat a, GLfloat b, GLfloat r)
{
    int i;

    GLfloat x=a;
    GLfloat y=b;
    GLfloat radius =r;
    int triangleAmount = 20;

    GLfloat twicePi = 2.0f * PI;

    glBegin(GL_TRIANGLE_FAN);
    glColor3ub	(211,211,211);
    glVertex2f(x, y);
    for(i = 0; i <= triangleAmount; i++)
    {
        glVertex2f(
            x + (radius * cos(i *  twicePi / triangleAmount)),
            y + (radius * sin(i * twicePi / triangleAmount))
        );
    }
    glEnd();
}



void ship()
{
    glPushMatrix();
    glTranslatef(position_ship1,0,0);

    Smoke(0.42f, 0.47f, 0.02f);
    Smoke(0.4f, 0.49f, 0.03f);
    Smoke(0.35f, 0.50f, 0.03f);
    Smoke(0.41f, 0.51f, 0.03f);
    Smoke(0.35f, 0.53f, 0.04f);
    Smoke(0.33f, 0.51f, 0.03f);
    Smoke(0.34f, 0.53f, 0.03f);
    Smoke(0.28f, 0.53f, 0.04f);
    Smoke(0.42f, 0.47f, 0.02f);

    //CARGO-1

    glBegin(GL_QUADS);
    glColor3ub(205,84,64);

    glVertex2f(-0.6f,-0.22f);
    glVertex2f(-0.4f,-0.25f);
    glVertex2f(-0.4f,0.0f);
    glVertex2f(-0.6f,0.0f);

    glEnd();

    glLineWidth(4);
    glBegin(GL_LINES);
    glColor3ub(1,1,1);

    glVertex2f(-0.6f,-0.22f);
    glVertex2f(-0.4f,-0.25f);

    glVertex2f(-0.4f,0.0f);
    glVertex2f(-0.6f,0.0f);


    //CARGO-1.2
    glBegin(GL_QUADS);
    glColor3ub(109,152,192);

    glVertex2f(-0.6f,0.0f);
    glVertex2f(-0.4f,0.0f);
    glVertex2f(-0.4f,0.15f);
    glVertex2f(-0.6f,0.15f);

    glEnd();



    //Cargo-1.3
    glBegin(GL_QUADS);
    glColor3ub(205,84,64);

    glVertex2f(-0.6f,0.15f);
    glVertex2f(-0.4f,0.15f);
    glVertex2f(-0.4f,0.25f);
    glVertex2f(-0.6f,0.25f);

    glEnd();



    //Cargo-2
    glBegin(GL_QUADS);
    glColor3ub(109,152,192);

    glVertex2f(-0.38f,-0.22f);
    glVertex2f(-0.18f,-0.22f);
    glVertex2f(-0.18f,0.0f);
    glVertex2f(-0.38f,0.0f);

    glEnd();

    //Cargo-2.2
    glBegin(GL_QUADS);
    glColor3ub(205,84,64);

    glVertex2f(-0.38f,0.0f);
    glVertex2f(-0.18f,0.0f);
    glVertex2f(-0.18f,0.1f);
    glVertex2f(-0.38f,0.1f);

    glEnd();


    //Cargo-2.3
    glBegin(GL_QUADS);
    glColor3ub(205,133,63);

    glVertex2f(-0.38f,0.1f);
    glVertex2f(-0.18f,0.1f);
    glVertex2f(-0.18f,0.15f);
    glVertex2f(-0.38f,0.15f);

    glEnd();

    //Cargo-3
    glBegin(GL_QUADS);
    glColor3ub (117,168,131);

    glVertex2f(-0.15f,-0.22f);
    glVertex2f(0.1f,-0.22f);
    glVertex2f(0.1f,0.02f);
    glVertex2f(-0.15f,0.02f);

    glEnd();

    //Cargo-3.2
    glBegin(GL_QUADS);
    glColor3ub(25,25,112);

    glVertex2f(-0.15f,0.02f);
    glVertex2f(0.1f,0.02f);
    glVertex2f(0.1f,0.1f);
    glVertex2f(-0.15f,0.1f);

    glEnd();


    //Cargo-3.3
    glBegin(GL_QUADS);
    glColor3ub(245,222,179);

    glVertex2f(-0.15f,0.1f);
    glVertex2f(0.1f,0.1f);
    glVertex2f(0.1f,0.15f);
    glVertex2f(-0.15f,0.15f);

    glEnd();


    //Cargo-4
    glBegin(GL_QUADS);
    glColor3ub(210,105,30);

    glVertex2f(0.1f,-0.22f);
    glVertex2f(0.3f,-0.22f);
    glVertex2f(0.3f,0.02f);
    glVertex2f(0.1f,0.02f);

    glEnd();


    //Cargo-4.2
    glBegin(GL_QUADS);
    glColor3ub (117,168,131);

    glVertex2f(0.1f,0.02f);
    glVertex2f(0.3f,0.02f);
    glVertex2f(0.3f,0.1f);
    glVertex2f(0.1f,0.1f);

    glEnd();

    //Cargo-4.3
    glBegin(GL_QUADS);
    glColor3ub(109,152,192);

    glVertex2f(0.1f,0.1f);
    glVertex2f(0.3f,0.1f);
    glVertex2f(0.3f,0.15f);
    glVertex2f(0.1f,0.15f);

    glEnd();


    //chimney
    glBegin(GL_QUADS);
    glColor3ub(139,69,19);

    glVertex2f(0.37f,-0.1f);
    glVertex2f(0.48f,-0.1f);
    glVertex2f(0.46,0.3f);
    glVertex2f(0.39f,0.3f);

    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(244,164,96);

    glVertex2f(0.39f,0.3f);
    glVertex2f(0.46f,0.3f);
    glVertex2f(0.455,0.38f);
    glVertex2f(0.395f,0.38f);

    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(255,215,0);

    glVertex2f(0.395f,0.38f);
    glVertex2f(0.455f,0.38f);
    glVertex2f(0.453,0.43f);
    glVertex2f(0.398f,0.43f);

    glEnd();

    glBegin(GL_POLYGON);//base
    glColor3ub(33,91,92);

    glVertex2f(-0.9f,-0.2f);
    glVertex2f(-0.8f,-0.3f);
    glVertex2f(-0.78f,-0.34f);

    glVertex2f(-0.7f,-0.34f);
    glVertex2f(0.78f,-0.34f);

    glVertex2f(1.0f,0.0f);
    glVertex2f(0.7f,-0.02f);
    glVertex2f(0.4f,-0.05f);

    glVertex2f(-0.2f,-0.15f);
    glVertex2f(-0.4f,-0.25f);
    glVertex2f(-0.6f,-0.22f);

    glEnd();

    glBegin(GL_QUADS);//base
    glColor3ub(144,184,192);

    glVertex2f(-0.78f,-0.34f);
    glVertex2f(-0.68f,-0.5f);
    glVertex2f(0.7f,-0.5f);
    glVertex2f(0.78f,-0.34f);

    glEnd();
    glPopMatrix();

}



void animation_ship2(int value)
{

    if(position_ship2 > 5.0)
    {
        position_ship2 = -5.0f;
    }

    position_ship2 += speed_ship2;

    glutPostRedisplay();


    glutTimerFunc(150, animation_ship2, 0);
}



void ship2()
{
    glPushMatrix();

    glScalef(-0.3,0.5,0);
    glTranslatef(-1.9,-1.2,0);
    glTranslatef(position_ship2,0,0);

    glTranslatef(-0.5,-0.05,0);

    Smoke(0.42f, 0.47f, 0.02f);
    Smoke(0.4f, 0.49f, 0.03f);
    Smoke(0.35f, 0.50f, 0.03f);
    Smoke(0.41f, 0.51f, 0.03f);
    Smoke(0.35f, 0.53f, 0.04f);
    Smoke(0.33f, 0.51f, 0.03f);
    Smoke(0.34f, 0.53f, 0.03f);
    Smoke(0.28f, 0.53f, 0.04f);
    Smoke(0.42f, 0.47f, 0.02f);
    //chimney;
    glBegin(GL_QUADS);
    glColor3ub(1,1,1);

    glVertex2f(0.37f,-0.1f);
    glVertex2f(0.48f,-0.1f);
    glVertex2f(0.46,0.3f);
    glVertex2f(0.39f,0.3f);

    glEnd();



    glBegin(GL_QUADS);
    glColor3ub(224, 36, 35);

    glVertex2f(0.39f,0.3f);
    glVertex2f(0.46f,0.3f);
    glVertex2f(0.455,0.38f);
    glVertex2f(0.395f,0.38f);

    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(1,1,1);

    glVertex2f(0.395f,0.38f);
    glVertex2f(0.455f,0.38f);
    glVertex2f(0.453,0.43f);
    glVertex2f(0.398f,0.43f);

    glEnd();

    glLoadIdentity();

    glScalef(-0.3,0.5,0);
    glTranslatef(-1.9,-1.2,0);
    glTranslatef(position_ship2,0,0);

    //upper
    glBegin(GL_QUADS);
    glColor3ub(253, 254, 252);

    glVertex2f(-0.2f,0.2f);
    glVertex2f(-0.3f,0.1f);
    glVertex2f(0.5f,0.1f);
    glVertex2f(0.4f,0.25f);

    glEnd();

    glBegin(GL_LINES);
    glColor3ub(0, 8, 31);

    glVertex2f(0.6f,0.2f);
    glVertex2f(-0.4f,0.1f);

    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(253, 254, 252);

    glVertex2f(-0.4f,0.1f);
    glVertex2f(-0.6f,-0.2f);
    glVertex2f(0.8f,-0.15f);
    glVertex2f(0.6f,0.2f);

    glEnd();


    glBegin(GL_POLYGON);//base
    glColor3ub(0, 8, 31);

    glVertex2f(-0.9f,-0.2f);
    glVertex2f(-0.8f,-0.3f);
    glVertex2f(-0.78f,-0.34f);

    glVertex2f(-0.7f,-0.34f);
    glVertex2f(0.78f,-0.34f);

    glVertex2f(1.0f,0.0f);
    glVertex2f(0.7f,0.0f);
    glVertex2f(0.4f,-0.05f);

    glVertex2f(-0.2f,-0.15f);
    glVertex2f(-0.4f,-0.25f);
    glVertex2f(-0.6f,-0.22f);

    glEnd();

    glBegin(GL_QUADS);//base
    glColor3ub(224, 36, 35);

    glVertex2f(-0.78f,-0.34f);
    glVertex2f(-0.68f,-0.5f);
    glVertex2f(0.7f,-0.5f);
    glVertex2f(0.78f,-0.34f);

    glEnd();

    //window

    glBegin(GL_QUADS);
    glColor3ub(40, 8, 31);

    glVertex2f(-0.4f,0.03f);
    glVertex2f(-0.47f,-0.07f);
    glVertex2f(-0.26f,-0.04f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(49, 162, 213);

    glVertex2f(-0.41f,0.031f);
    glVertex2f(-0.48f,-0.06f);
    glVertex2f(-0.27f,-0.03f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glTranslatef(0.16,0.025,0);

    glBegin(GL_QUADS);
    glColor3ub(40, 8, 31);

    glVertex2f(-0.4f,0.03f);
    glVertex2f(-0.4f,-0.065f);
    glVertex2f(-0.26f,-0.04f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(49, 162, 213);

    glVertex2f(-0.41f,0.031f);
    glVertex2f(-0.42f,-0.064f);
    glVertex2f(-0.27f,-0.03f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glLoadIdentity();

    glScalef(-0.3,0.5,0);
    glTranslatef(-1.9,-1.2,0);
    glTranslatef(position_ship2,0,0);

    glTranslatef(0.32,0.05,0);


    glBegin(GL_QUADS);
    glColor3ub(40, 8, 31);

    glVertex2f(-0.4f,0.03f);
    glVertex2f(-0.4f,-0.065f);
    glVertex2f(-0.26f,-0.04f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(49, 162, 213);

    glVertex2f(-0.41f,0.031f);
    glVertex2f(-0.42f,-0.064f);
    glVertex2f(-0.27f,-0.03f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glLoadIdentity();

    glScalef(-0.3,0.5,0);
    glTranslatef(-1.9,-1.2,0);
    glTranslatef(position_ship2,0,0);

    glTranslatef(0.48,0.075,0);


    glBegin(GL_QUADS);
    glColor3ub(40, 8, 31);

    glVertex2f(-0.4f,0.03f);
    glVertex2f(-0.4f,-0.065f);
    glVertex2f(-0.26f,-0.04f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(49, 162, 213);

    glVertex2f(-0.41f,0.031f);
    glVertex2f(-0.42f,-0.064f);
    glVertex2f(-0.27f,-0.03f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glLoadIdentity();

    glScalef(-0.3,0.5,0);
    glTranslatef(-1.9,-1.2,0);
    glTranslatef(position_ship2,0,0);

    glTranslatef(0.64,0.094,0);

    glBegin(GL_QUADS);
    glColor3ub(49, 162, 213);

    glBegin(GL_QUADS);
    glColor3ub(40, 8, 31);

    glVertex2f(-0.4f,0.03f);
    glVertex2f(-0.4f,-0.065f);
    glVertex2f(-0.26f,-0.04f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(49, 162, 213);

    glVertex2f(-0.41f,0.031f);
    glVertex2f(-0.42f,-0.064f);
    glVertex2f(-0.27f,-0.03f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glLoadIdentity();

    glScalef(-0.3,0.5,0);
    glTranslatef(-1.9,-1.2,0);
    glTranslatef(position_ship2,0,0);

    glTranslated(0.81,0.115,0);

    glBegin(GL_QUADS);
    glColor3ub(49, 162, 213);

    glBegin(GL_QUADS);
    glColor3ub(40, 8, 31);

    glVertex2f(-0.4f,0.03f);
    glVertex2f(-0.4f,-0.065f);
    glVertex2f(-0.26f,-0.04f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glBegin(GL_QUADS);
    glColor3ub(49, 162, 213);

    glVertex2f(-0.41f,0.031f);
    glVertex2f(-0.42f,-0.064f);
    glVertex2f(-0.27f,-0.03f);
    glVertex2f(-0.26f,0.05f);

    glEnd();

    glLoadIdentity();
    glPopMatrix();
}



void CircleSnow(GLfloat a, GLfloat b, GLdouble r,int R,int G,int B)
{
    int i;

    GLfloat x=a;
    GLfloat y=b;
    GLdouble radius =r;
    int triangleAmount = 60;

    GLfloat twicePi = 2.0f * PI;

    glBegin(GL_TRIANGLE_FAN);
    glColor3ub(R, G, B);
    glVertex2f(x, y);
    for(i = 0; i <= triangleAmount; i++)
    {
        glVertex2f(
            x + (radius * sin(i *  twicePi / triangleAmount)),
            y + 2*(radius * cos(i * twicePi / triangleAmount))
        );
    }
    glEnd();
}



void snowAnimation(int value)
{

    if(snowPos <-5)
        snowPos = -4;

    snowPos -= snowSpd;

    glutPostRedisplay();


    glutTimerFunc(100, snowAnimation, 0);
}



void snowFall()
{
    //CircleSnow(0,-0.5,0.01,190, 217, 244);'

    int cnt = 0;
    float posY = 0.99;

    for(int i=0; i<100; i++)
    {
        float posX = -1.5;

        for(int j=0; j<15; j++)
        {
            if(cnt%4==0)
            {
                posX +=0.33;
            }
            else if(cnt%3==0)
            {
                posX +=0.25;
            }
            else
            {
                posX +=0.15;
            }
            CircleSnow(posX,posY,0.008,240, 240, 240);
            CircleSnow(posX,posY,0.005,198, 222, 245);


            cnt++;

        }
        posY +=0.2;

    }

}



void animation_waves(int value)
{

    if(position_waves > 1.0)
    {
        position_waves = -1.0f;
    }

    position_waves += speed_waves;

    glutPostRedisplay();


    glutTimerFunc(300, animation_waves, 0);
}



void waves()
{
    glLineWidth(0.6);

    glPushMatrix();

    glTranslatef(position_waves,0,0);

    glBegin(GL_LINES);
    glColor3ub(255,255,255);

    glVertex2f(-0.1f,-0.4f);
    glVertex2f(0.0f,-0.4f);

    glVertex2f(-0.2f,-0.7f);
    glVertex2f(-0.1f,-0.7f);

    glVertex2f(0.5f,-0.6f);
    glVertex2f(0.4f,-0.6f);

    glVertex2f(0.6f,-0.45f);
    glVertex2f(0.7f,-0.45f);

    glVertex2f(-0.9f,-0.9f);
    glVertex2f(-0.8f,-0.9f);

    glVertex2f(0.6f,-0.82f);
    glVertex2f(0.7f,-0.82f);

    glVertex2f(0.6f,-0.82f);
    glVertex2f(0.7f,-0.82f);

    glEnd();

    glPopMatrix();

    glEnd();
}



void WinterRiver()
{
    glBegin(GL_QUADS);
    glColor3ub(162, 181, 236);
    glVertex2f(-1.0f,-0.27f);
    glVertex2f(-1.0f,-1.0f);
    glVertex2f(1.0f,-1.0f);
    glColor3ub(231,245,254);
    glVertex2f(1.0f,-0.27f);
    glEnd();

    glLineWidth(4);

    glBegin(GL_LINES);
    glColor3ub(205,237,241);
    glVertex2f(-0.9f,-0.9f);
    glVertex2f(0.6f,-0.3f);

    glVertex2f(-0.7f,-0.65f);
    glVertex2f(0.0f,-0.4f);

    glEnd();
    glTranslatef(0.5,0.2,0);
    glBegin(GL_LINES);
    glColor3ub(205,237,241);

    glVertex2f(-0.05f,-0.75f);
    glVertex2f(-0.4f,-0.9f);

    glEnd();

    glLoadIdentity();

}



void StormCloud(GLfloat a, GLfloat b, GLfloat r)
{
    int i;

    GLfloat x=a;
    GLfloat y=b;
    GLfloat radius =r;
    int triangleAmount = 20;

    GLfloat twicePi = 2.0f * PI;

    glBegin(GL_TRIANGLE_FAN);
    glVertex2f(x, y);
    for(i = 0; i <= triangleAmount; i++)
    {
        glVertex2f(
            x + (radius * cos(i *  twicePi / triangleAmount)),
            y + (radius * sin(i * twicePi / triangleAmount))
        );
    }
    glEnd();
}



void RainCloud()
{
	glTranslatef(-0.05,0.95,0.0);//cloud3
    glScalef(0.5,0.6,0.0);
	glColor3ub(129,145,167);
	StormCloud(0.0,0.0,0.1);
	StormCloud(0.0,0.05,0.1);
	StormCloud(0.0,-0.05,0.1);
	StormCloud(-0.15,0.015,0.15);
	StormCloud(0.15,0.015,0.15);
	StormCloud(-0.3,0.025,0.1);
	StormCloud(0.3,0.025,0.1);
	StormCloud(0.0,0.1,0.1);

	glLoadIdentity();

	glTranslatef(-0.3,0.85,0);//cloud2
	glScalef(0.5,0.6,0.0);

	glColor3ub(171,200,218);
	StormCloud(0.0,0.0,0.1);
	StormCloud(0.0,0.05,0.1);
	StormCloud(0.0,-0.05,0.1);
	StormCloud(-0.15,0.015,0.15);
	StormCloud(0.15,0.015,0.15);
	StormCloud(-0.3,0.025,0.1);
	StormCloud(0.3,0.025,0.1);
	StormCloud(0.0,0.1,0.1);

	glLoadIdentity();


	glTranslatef(-0.4,0.95,0);//cloud1
	glScalef(0.5,0.6,0.0);

    glColor3ub(225,241,249);
	StormCloud(0.0,0.0,0.1);
	StormCloud(0.0,0.05,0.1);
	StormCloud(0.0,-0.05,0.1);
	StormCloud(-0.15,0.015,0.15);
	StormCloud(0.15,0.015,0.15);
	StormCloud(-0.3,0.025,0.1);
	StormCloud(0.3,0.025,0.1);
	StormCloud(0.0,0.1,0.1);


	glLoadIdentity();

    glTranslatef(0.7,0.95,0.0);//cloudR2
    glScalef(0.5,0.6,0.0);
	glColor3ub(129,145,167);
	StormCloud(0.0,0.0,0.1);
	StormCloud(0.0,0.05,0.1);
	StormCloud(0.0,-0.05,0.1);
	StormCloud(-0.15,0.015,0.15);
	StormCloud(0.15,0.015,0.15);
	StormCloud(-0.3,0.025,0.1);
	StormCloud(0.3,0.025,0.1);
	StormCloud(0.0,0.1,0.1);

	glLoadIdentity();

    glTranslatef(0.95,0.92,0);//cloudR1
	glScalef(0.5,0.6,0.0);

	glColor3ub(171,200,218);
	StormCloud(0.0,0.0,0.1);
	StormCloud(0.0,0.05,0.1);
	StormCloud(0.0,-0.05,0.1);
	StormCloud(-0.15,0.015,0.15);
	StormCloud(0.15,0.015,0.15);
	StormCloud(-0.3,0.025,0.1);
	StormCloud(0.3,0.025,0.1);
	StormCloud(0.0,0.1,0.1);

	glLoadIdentity();
}
