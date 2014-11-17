using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BlackJack
{
    class Program : model.Observer
    {
        static void Main(string[] args)
        {
            view.IView v = new view.SwedishView();//new view.SimpleView();
            controller.PlayGame ctrl = new controller.PlayGame();
            List<model.Observer> observerList = new List<model.Observer>();
            observerList.Add(ctrl);
            model.Game g = new model.Game(observerList);
            

            while (ctrl.Play(g, v));
        }
    }
}
