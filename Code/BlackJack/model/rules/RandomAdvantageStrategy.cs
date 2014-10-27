using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BlackJack.model.rules
{
    class RandomAdvantageStrategy : IWinGameStrategy
    {
        public bool DidWin(Player playerOne, Player playerTwo, int maxScore)
        {
            Random rnd = new Random();
            //[0,2)
            int r = rnd.Next(0,2);
            return r == 1;
        }
    }
}
