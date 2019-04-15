using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using System.Data;

namespace WcfServiceLibrary1
{
    // ПРИМЕЧАНИЕ. Команду "Переименовать" в меню "Рефакторинг" можно использовать для одновременного изменения имени интерфейса "IService1" в коде и файле конфигурации.
    [ServiceContract]
    public interface IService1
    {
        [OperationContract]
        DataSet AllClients();      

        [OperationContract]
        DataSet GetClient(int id);

        [OperationContract]
        string InsClient(string fio);

        [OperationContract]
        string DelClient(int id);

        [OperationContract]
        string UpdClient(int id, string fio);


        [OperationContract]
        DataSet AllOrders();
        
        [OperationContract]
        DataSet GetOrder(int id);

        [OperationContract]
        string InsOrder(int id);

        [OperationContract]
        string DelOrder(int id);

        [OperationContract]
        string UpdOrder(int idOr, int idCl);


        [OperationContract]
        DataSet AllUsluga();

        [OperationContract]
        DataSet GetUsluga(int id);

        [OperationContract]
        string InsUsluga(string name, int price);

        [OperationContract]
        string DelUsluga(int id);

        [OperationContract]
        string UpdUsluga(int id, int price);


        [OperationContract]
        DataSet AllOredersUsluga();

        [OperationContract]
        DataSet GetOredersUsluga(int id);

        [OperationContract]
        string InsOredersUsluga(int idOr, int idUs);

        // TODO: Добавьте здесь операции служб
    }

    // Используйте контракт данных, как показано на следующем примере, чтобы добавить сложные типы к сервисным операциям.
    // В проект можно добавлять XSD-файлы. После построения проекта вы можете напрямую использовать в нем определенные типы данных с пространством имен "WcfServiceLibrary1.ContractType".
   
}
